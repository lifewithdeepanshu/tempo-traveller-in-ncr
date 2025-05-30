// Book Now Form
document.getElementById('travelForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const formData = new FormData(this);
  const data = {
    fullName: formData.get('fullName'),
    email: formData.get('email'),
    phone: formData.get('phone'),
    starttravelDate: formData.get('starttravelDate'),
    endtravelDate: formData.get('endtravelDate'),
		pickup: formData.get('pickup'),
		destination: formData.get('destination'),
    passengers: formData.get('passengers'),
    message: formData.get('message')
  };

  // Replace with your WhatsApp number (with country code, no +)
  const whatsappNumber = "919999029051"; // Example: +91 9999988877 => 919999988877

  const message = `*Travel Inquiry:*
Name: ${data.fullName}
Email: ${data.email}
Phone: ${data.phone}
Start Travel Date: ${data.starttravelDate}
End Travel Date: ${data.endtravelDate}
Pickup Point: ${data.pickup}
Destination: ${data.destination}
No. of Passengers: ${data.passengers}
Message: ${data.message}


by *tempotravellerinncr.in*`;

  const encodedMessage = encodeURIComponent(message);
  const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;

  // Redirect to WhatsApp
  window.open(whatsappURL, '_blank');
});

// Contact Page From
function sendToWhatsApp() {
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const phone = document.getElementById("phone").value;
  const passengers = document.getElementById("passengers").value;
  const startDate = document.getElementById("startDate").value;
  const endDate = document.getElementById("endDate").value;
  const pickup = document.getElementById("pickup").value;
  const destination = document.getElementById("destination").value;
  const message = document.getElementById("message").value;

  const whatsappMessage = `Hello, I would like to book a Tempo Traveller:
Name: ${name}
Email: ${email}
Phone: ${phone}
No. of Passengers: ${passengers}
Start Date: ${startDate}
End Date: ${endDate}
Pickup: ${pickup}
Destination: ${destination}
Message: ${message}

by *tempotravellerinncr.in*`;

  const phoneNumber = "919999029051"; // Replace with your WhatsApp number (without +)
  const whatsappURL = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(whatsappMessage)}`;
  
  window.open(whatsappURL, "_blank");
}