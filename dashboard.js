const formData = new FormData();
formData.append('image', file);
formData.append('username', username);

fetch('http://localhost:3001/upload', {  // ← this calls the backend
    method: 'POST',
    body: formData
})
.then(response => response.json())
.then(data => {
    if (data.imageUrl) {
        document.getElementById(`img-${username}`).src = data.imageUrl;
    }
})
.catch(err => console.error(err));
