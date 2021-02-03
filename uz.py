import mysql.connector
import csv
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="usermanage"
)
mycursor = mydb.cursor()
with open('uz.csv') as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')
    line_count = 0
    for row in csv_reader:
        row=row[0].split(";")

        sql = "INSERT INTO citylists (city_key, city) VALUES(%s, %s)"
        val = (str(row[0]), str(row[0]+';'+row[1]))
        mycursor.execute(sql,val)

        # print(val)
        line_count += 1
    print(f'Processed {line_count} lines.')
    mydb.commit()



# print("1 record inserted, ID:", mycursor.lastrowid)