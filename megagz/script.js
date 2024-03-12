let filesArray = [];

function fileList() {
    const fileList = document.getElementById('file-list')
    fileList.innerHTML = ''

    filesArray.forEach(file => {
        const li = document.createElement('li')
        li.textContent = file.name
        fileList.appendChild(li)
    })
}

document.getElementById('file-input').addEventListener('change', function(e) {
    filesArray = Array.from(e.target.files)
    fileList()
})

function archive() {
    const archiveName = document.getElementById('archive-name').value
    const downloadBtn = document.getElementById('download-btn')
    const errorBox = document.getElementById('error')

    if (archiveName && filesArray.length > 0) {
        const formData = new FormData()
        formData.append('archiveName', archiveName)
        filesArray.forEach(file => {
            formData.append('files[]', file)
        });
      
        fetch('archive.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                downloadBtn.style.display = 'inline-block'
                downloadBtn.innerHTML = 'Télécharger ' + archiveName + '.tar'
            }
            else {
                errorBox.style.display = 'inline-block'
                errorBox.innerHTML = 'Erreur lors de la compression de l\'archive.'
            }
        })
        .catch(error => {
            console.error('Erreur:', error)
        })
    }
    else {
        errorBox.style.display = 'inline-block'
        errorBox.innerHTML = 'Veuillez spécifier un nom d\'archive et inclure des fichiers.'
    }
}

function download() {
    const archiveName = document.getElementById('archive-name').value;
    if (archiveName && filesArray.length > 0) {
        window.location.href = `download.php?archiveName=${archiveName}`
    }
    else {
        alert('Veuillez spécifier un nom d\'archive et ajouter des fichiers.')
    }
}