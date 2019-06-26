import requests
import re
from bs4 import BeautifulSoup

for i in range(1, 5):
    f = open('C:\\Users\\Wellington\\Downloads\\teste' + str(i) + '.html', 'r')
    s = f.read()
    soup = BeautifulSoup(s, 'html.parser')
    entry = soup.find('table', {'id' : 'Horarios'})
    entry = entry.find_all('td', attrs = {'class': ''})
    for td in entry:
        cadeira = re.sub(' +', ' ', td.get_text()).replace('\n', '')
        if(cadeira[0] == '('):
            cadeira = cadeira[cadeira.find(' ')+1:].capitalize()
            print("INSERT INTO Course (name) VALUES (\'" + cadeira + "\');")
    f.close()