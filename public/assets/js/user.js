function setProgressValue(circleElement, percentage) {
    const progressElement = circleElement.querySelector('.progress');
    const radius = progressElement.getAttribute('r');
    const circumference = 2 * Math.PI * radius;
    const offset = circumference * (1 - percentage / 100);

    progressElement.style.strokeDashoffset = offset;
}

const circleElement = document.querySelector('.circle');
setProgressValue(circleElement, pourcentageLivre);