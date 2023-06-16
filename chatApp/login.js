const form = document.querySelector('.push-top form'),
submitBtn = form.querySelector('.push');
let error_txt = form.querySelector(".alert");

form.onsubmit = (e) => {
    e.preventDefault();
}

submitBtn.onclick = () => {
    //Let's start ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "loginv.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == "success") {
                    location.href = "users.php";
                    
                }
                else{
                    console.log(data);
                    error_txt.textContent = data;
                    error_txt.style.display = "block";
                }
            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata); 
}