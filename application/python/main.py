 
import pandas as pd
import mysql.connector
import os
from mysql.connector import Error

 

directory_path = 'uploads'

 
file_terakhir = max([os.path.join(directory_path, f) for f in os.listdir(directory_path)], key=os.path.getctime)


file_terakhir
df = pd.read_excel(file_terakhir)
df

 
df.rename(columns={
    'ID' : 'id_customer',
    'Basic Salary' : 'basic_salary',
    'Tunjangan 1' : 'tunjangan1',
    'Tunjangan 2' : 'tunjangan2',
    'Tunjangan 3' : 'tunjangan3',
}, inplace=True)

 
required_columns = ['id_customer', 'basic_salary','tunjangan1', 'tunjangan2', 'tunjangan3']
if not all(column in df.columns for column in required_columns):
    raise ValueError(f"Excel file must contain {', '.join(required_columns)} columns")

try:
    connection = mysql.connector.connect(
        host='localhost',
        database='db_test',
        user='root',
        password=''
    )

    if connection.is_connected():
        cursor = connection.cursor()
        df = df.fillna(0)
        for index, row in df.iterrows():
            total = row['basic_salary'] + row['tunjangan1'] + row['tunjangan2'] + row['tunjangan3']
            update_query = """UPDATE tb_customer SET basic_salary = %s,tunjangan1 = %s, tunjangan2 = %s, tunjangan3 = %s,total = %s WHERE id_customer = %s"""
            cursor.execute(update_query, (row['basic_salary'], row['tunjangan1'], row['tunjangan2'], row['tunjangan3'], total, row['id_customer'] ))

        connection.commit()
        print("Data berhasil diupdate")

except Error as e:
    print(f"Error while connecting to MySQL: {e}")

finally:
    if connection.is_connected():
        cursor.close()
        connection.close()
        print("MySQL connection is closed")
        print("Data berhasil diupdate")

 



