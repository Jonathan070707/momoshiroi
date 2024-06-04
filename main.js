
  document.addEventListener('DOMContentLoaded', function () {
    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');
    const slider = document.querySelector('.image-slider');
    const slides = document.querySelectorAll('.slider-image');
    let currentIndex = 0;

    // Set the width of the slider to match the number of slides
    slider.style.width = `${slides.length * 100}%`;
    slides.forEach(slide => {
      slide.style.width = `${100 / slides.length}%`;
    });

    prevButton.addEventListener('click', () => {
      if (currentIndex > 0) {
        currentIndex--;
        updateSliderPosition();
      }
    });

    nextButton.addEventListener('click', () => {
      if (currentIndex < slides.length - 1) {
        currentIndex++;
        updateSliderPosition();
      }
    });

    function updateSliderPosition() {
      slider.style.transform = `translateX(-${currentIndex * 100 / slides.length}%)`;
    }
  });

