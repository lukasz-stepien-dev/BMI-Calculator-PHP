const height = document.querySelector('#height');
const weight = document.querySelector('#weight');
const info = document.querySelector('.info');
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
        info.innerHTML += "<br><input type='submit' value='Zapisz'>"
    } else {
        info.textContent = 'Nie podałeś danych!';
    }
});