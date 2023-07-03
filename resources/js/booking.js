// Управление боковым меню
const bookingBigOpt = document.querySelectorAll('.booking-data-option');

bookingBigOpt.forEach(bookOption => {
  const bookingButton = bookOption.querySelector('.booking-data-dropdown');

  bookingButton.addEventListener('click', () => {
    bookingButton.classList.toggle('booking-data-dropdown--open');

    const bookingOption = bookOption.querySelector('.booking-datas');

    bookingOption.classList.toggle('booking-datas--close');
  });
});

// const timeSection = document.querySelector('.booking-data-option');
// const checkboxes = timeSection.querySelectorAll('.box-box');
// const timeText = timeSection.querySelector('#selectedTime');

// checkboxes.forEach(checkbox => {
//   checkbox.addEventListener('change', () => {
//     if (checkbox.checked) {
//       timeText.textContent = checkbox.name;
//       checkboxes.forEach(otherCheckbox => {
//         if (otherCheckbox !== checkbox) {
//           otherCheckbox.checked = false;
//         }
//       });
//     }
//   });
// });

// const submitButton = document.querySelector('#submitBooking');
// const servicesCheckboxes = document.querySelectorAll('.service-checkbox');

// submitButton.addEventListener('click', () => {
//   const selectedDate = document.querySelector('.booking-date-input').value;
//   const selectedTime = document.querySelector('#selectedTime').textContent;
//   const selectedServices = Array.from(servicesCheckboxes)
//     .filter(checkbox => checkbox.checked)
//     .map(checkbox => checkbox.name);

//   // Make an AJAX request to the server to store the booking details
//   // You can use JavaScript fetch API or a library like Axios for the request
//   // Pass the selectedDate, selectedTime, and selectedServices to the server

//   // Example using fetch API
//   fetch('/bookings', {
//     method: 'POST',
//     headers: {
//       'Content-Type': 'application/json',
//     },
//     body: JSON.stringify({
//       date: selectedDate,
//       time: selectedTime,
//       services: selectedServices,
//     }),
//   })
//     .then(response => response.json())
//     .then(data => {
//       // Handle the response from the server
//       // Display success message or redirect to a new page
//       console.log(data);
//       // You can refresh the page or update the UI as needed
//       location.reload();
//     })
//     .catch(error => {
//       // Handle any errors that occurred during the request
//       console.error(error);
//     });
// });

// // Assuming you have variables to store the prices of booked products and services
// const bookedProductsTotal = calculateBookedProductsTotal(); // Replace with your own logic
// const bookedServicesTotal = calculateBookedServicesTotal(); // Replace with your own logic

// const totalBookingPriceElement = document.querySelector('.total-booking-price');
// const totalPrice = bookedProductsTotal + bookedServicesTotal;
// totalBookingPriceElement.textContent = `Total: ${totalPrice}$`;
