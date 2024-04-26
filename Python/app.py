import mysql.connector

#Conectar a la BD
conexion = mysql.connector.connect(user='codi2', password='codi', database='codi',host='localhost')

#Cursor para ejecutar consultas
cursor = conexion.cursor()

#Ejecutar consulta
cursor.execute("SELECT * FROM users")

#obtenemos resultados.. guardamos en al variable todos los registros que nos devolvio la consulta
results = cursor.fetchall()

#mostramos resultados
for fila in results:
    print(fila)

#cerramos cursor
cursor.close()
conexion.close()
