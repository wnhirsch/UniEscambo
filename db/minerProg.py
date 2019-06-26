import requests
from bs4 import BeautifulSoup

req = requests.get('http://www.ufrgs.br/ufrgs/ensino/graduacao/cursos')
content = req.content
soup = BeautifulSoup(content, 'html.parser')
lst = []
entry = soup.find_all('ul', {'class' : 'cursos'})
for ul in entry:
    entry1 = ul.find_all('a')
    for a in entry1:
        lst.append(a['href'])

for link in lst:
    link = "http://www.ufrgs.br" + link
    req = requests.get(link)
    content = req.content

    soup = BeautifulSoup(content, 'html.parser')

    title = soup.find('h1', {'id' : 'parent-fieldname-title'}).get_text()
    about = soup.find('p', {'class' : 'documentDescription'}).get_text()
    
    print ("INSERT INTO Program (name, about) VALUES (\'" + title + "\', \'" + about + "\');\n")

        
