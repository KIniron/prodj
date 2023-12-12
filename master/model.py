import mysql.connector
import pandas as pd
from sklearn.preprocessing import LabelEncoder, StandardScaler
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Dense

# Підключення до бази даних  PHPMyAdmin
user = 'root'
password = 'root'
host = 'localhost'
database = 'register'

connection = mysql.connector.connect(user=user, password=password, host=host, database=database)


query = "SELECT profession, work_experience FROM masters"  
data = pd.read_sql_query(query, connection)


data = data.dropna()

# Закриваємо з'єднання з базою даних
connection.close()

# Обробка та навчання моделі
label_encoder = LabelEncoder()
data['profession'] = label_encoder.fit_transform(data['profession'])
X = data[['profession']]
Y = data['work_experience']


if X.shape[0] > 0:
    scaler = StandardScaler()
    X_scaled = scaler.fit_transform(X)

    model = Sequential()
    model.add(Dense(64, input_dim=X_scaled.shape[1], activation='relu'))
    model.add(Dense(32, activation='relu'))
    model.add(Dense(1, activation='linear'))

    model.compile(loss='mean_squared_error', optimizer='adam', metrics=['mae'])

   
    model.fit(X_scaled, Y, epochs=25, batch_size=32)

    # Збереження моделі
    model.save('experience_prediction_model1.h5')
else:
    print("Немає достатньої кількості зразків для навчання моделі.")