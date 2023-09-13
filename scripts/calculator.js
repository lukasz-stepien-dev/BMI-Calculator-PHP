const height = document.querySelector('#height');
const weight = document.querySelector('#weight');
const info = document.querySelector('.info');

function createCookie(name, value, days) {
    let expires;

    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }

    document.cookie = name + "=" +
        value + expires + "; path=/";
}

document.querySelector('#calc').addEventListener('click', evt => {
    evt.preventDefault();
    if (height.value !== '' && height.value !== '') {
        let bmi = parseFloat(weight.value) / (Math.pow(parseFloat(height.value) / 100, 2))
        bmi = Math.round(bmi * 100) / 100;
        info.innerHTML = `Twoje BMI: ${bmi} <br>`;
        if (bmi < 18.4) {
            info.textContent += 'Niedowaga';
        } else if (bmi < 24.9 && bmi > 18.5) {
            info.textContent += 'W normie';
        } else {
            info.textContent += 'Nadwaga';
        }
        createCookie('bmiToSave', `${bmi}`, 1);
        createCookie('weightToSave', weight.value, 1);
        createCookie('heightToSave', height.value, 1);
        info.innerHTML += "<br><form action='../php/save.php' method='post'>" +
                            "<input name='save' type='submit' value='Zapisz'></form>";

    } else {
        info.textContent = 'Nie podałeś danych!';
    }
});