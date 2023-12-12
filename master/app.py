from flask import Flask, request, jsonify
import mysql.connector
import pandas as pd
from sklearn.preprocessing import LabelEncoder, StandardScaler
from tensorflow.keras.models import load_model
from flask_cors import CORS
import json  


app = Flask(__name__)
CORS(app)


def after_request(response):
    response.headers.add('Access-Control-Allow-Origin', 'http://localhost:501')

    response.headers.add('Access-Control-Allow-Headers', 'Content-Type,Authorization')
    response.headers.add('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,OPTIONS')
    return response
app.after_request(after_request)

model = load_model('./experience_prediction_model.h5')


db_params = {
    'user': 'root',
    'password': 'root',
    'host': 'localhost',
    'database': 'register'
}


@app.route('/predict_experience', methods=['POST'])
def predict_experience():
    data = request.get_json()

    connection = mysql.connector.connect(**db_params)
    query = "SELECT name, email, profession, work_experience FROM masters"
    masters_data = pd.read_sql_query(query, connection)
    connection.close()

    label_encoder = LabelEncoder()
    masters_data['profession'] = label_encoder.fit_transform(masters_data['profession'])

    X = masters_data[['profession']]
    Y = masters_data['work_experience']

    scaler = StandardScaler()
    X_scaled = scaler.fit_transform(X)

    predicted_experience = model.predict(X_scaled)

    # Використовуйте дані з бази даних для імен
    best_master_data = masters_data.loc[masters_data['work_experience'].idxmax()]
    worst_master_data = masters_data.loc[masters_data['work_experience'].idxmin()]

    response_data = {
        'success': True,
        'bestMaster': {
            'name': best_master_data['name'],
            'email': best_master_data['email'],  
            'profession': data['profession'],
            #'predicted_experience': predicted_experience .tolist()
        },
        'worstMaster': {
            'name': worst_master_data['name'],
            'email': worst_master_data['email'],  
            'profession': data['profession'],
            #'predicted_experience': predicted_experience.tolist()  
        }
    }

    
    return jsonify(response_data)



if __name__ == '__main__':
    app.run(port=5000, debug=True)

    

