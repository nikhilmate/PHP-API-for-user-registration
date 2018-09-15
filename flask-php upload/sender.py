import requests
f = open('img1.jpg', 'rb')
files = {'file' : f}
payload = {'key':'nik'}
url = 'http://localhost:80/filetrack/reciever.php'
r = requests.post(url, data=payload, files=files)
if r:
    print(r.text)