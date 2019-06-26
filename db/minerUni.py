import requests
from bs4 import BeautifulSoup

req = requests.get('https://pt.wikipedia.org/wiki/Lista_de_institui%C3%A7%C3%B5es_de_ensino_superior_do_Brasil')
content = req.content
soup = BeautifulSoup(content, 'html.parser')
lst = []
entry = soup.find_all('a', href = True, title = True)
print(entry)



