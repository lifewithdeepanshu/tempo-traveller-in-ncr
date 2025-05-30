<?php
// DB config
$host = 'localhost';
$username = 'innova_cab';
$password = 'Tiger@12811281';
$database = 'innovacabrental_db';

// Connect to DB
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch all entries (you can change table/columns)
$sql = "SELECT * FROM destination";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

		$locations = [
			'Delhi',
			'Ghaziabad',
			'Faridabad',
			'Noida',
			'Gurgaon'
		];

    $id = $row['ID'];
    $destination = htmlspecialchars($row['Destination']);

		// create 5 page of each location.. delhi, noida, etc.
		foreach ($locations as $from) {
			// Optional: Generate a slug from the title
			$slugFrom = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $from), '-'));
			$slugTo = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $destination), '-'));
			$filename = "{$slugFrom}-to-{$slugTo}-tempo-traveller.html";

    // Use HEREDOC for HTML structure
    $html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Book {$from} to {$destination} Tempo Traveller at reasonable prices. 9 to 26 seater available. Clean, comfortable rides with experienced drivers.">
  <meta name="keywords" content="{$from} to {$destination} Tempo Traveller, Tempo Traveller {$from}">
  <title>{$from} to {$destination} Tempo Traveller | Book Now</title>

	<!-- Favicons -->
  <link href="assets/images/logo.png" rel="icon">
  <link href="assets/images/logo.png" rel="apple-touch-icon">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

  <!-- Header -->
	<div id="header"></div>

  <!-- Hero Section -->
	<section class="bg-yellow-300 py-16">
    <div class="max-w-5xl mx-auto text-center px-4">
      <h2 class="text-3xl md:text-4xl font-bold mb-4">{$from} to {$destination} Tempo Traveller</h2>
			<p class="text-lg mb-6">Hire 9, 12, 16, 20, and 26 seater Tempo Traveller from {$from} to {$destination}. Comfortable, Affordable, and Hassle-Free Group Travel from {$from}</p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="tel:+919999029051" class="bg-blue-700 text-white px-6 py-3 rounded hover:bg-blue-800 transition">
          <i class="bi bi-telephone-fill mr-2"></i> Call Now
        </a>
        <a href="https://wa.me/919999029051" class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-700 transition">
          <i class="bi bi-whatsapp mr-2"></i> WhatsApp Us
        </a>
      </div>
    </div>
  </section>

	<!-- Detailed About Section -->
	<section class="bg-gray-50 py-14">
		<div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row gap-10 items-center">

			<!-- Image -->
			<div class="md:w-1/2">
				<img src="assets/images/services/tempo-traveller-in-{$slugFrom}.jpg" alt="{$from} to {$destination} Tempo Traveller" class="rounded shadow-lg w-full h-auto object-cover">
			</div>

			<!-- Content -->
			<div class="md:w-1/2">
				<h2 class="text-3xl font-bold mb-4">Reliable Tempo Traveller Service from {$from} to {$destination}</h2>
				<p class="text-gray-700 mb-4 text-sm leading-relaxed">
					Planning a trip from {$from} to {$destination}? Whether it's a family vacation, corporate outing, school tour, or weekend getaway, our Tempo Traveller rental service ensures a smooth and enjoyable journey. With well-maintained vehicles, experienced drivers, and flexible travel plans, we make your travel stress-free and convenient.
				</p>
				<p class="text-gray-700 mb-4 text-sm leading-relaxed">
					All our vehicles are equipped with AC, pushback seats, music systems, and experienced drivers familiar with {$from} and beyond. We prioritize comfort, punctuality, and safety — all at affordable rates. Book your Tempo Traveller now from Karol Bagh and travel stress-free!
				</p>
				<h2>Why Choose Us?</h2>
				<ul class="list-disc pl-5 text-gray-700 text-sm mb-6">
					<li>24/7 Booking Support & Instant Confirmation</li>
					<li>Clean, Comfortable & GPS-enabled Vehicles</li>
					<li>Transparent Pricing – No Hidden Charges</li>
					<li>Trusted by 1000+ Happy Travellers</li>
				</ul>
				<p class="text-gray-700 mb-4 text-sm leading-relaxed">Book your Tempo Traveller from {$from} to {$destination} today and travel the smart way. Contact us now for the best rates and packages.</p>
				<div class="flex gap-4">
					<a href="tel:+919999029051" class="bg-blue-700 text-white px-5 py-2 rounded flex items-center gap-2 hover:bg-blue-800 text-sm">
						<i class="bi bi-telephone-fill"></i> Call to Book
					</a>
					<a href="https://wa.me/919999029051" class="bg-green-600 text-white px-5 py-2 rounded flex items-center gap-2 hover:bg-green-700 text-sm">
						<i class="bi bi-whatsapp"></i> WhatsApp Now
					</a>
				</div>
			</div>

		</div>
	</section>

  <!-- Services -->
  <section class="py-12 bg-gray-100">
    <div class="max-w-6xl mx-auto px-4">
      <h3 class="text-2xl font-bold mb-6 text-center">Our Services</h3>
      <div class="grid md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded shadow">
          <i class="bi bi-geo-alt-fill text-3xl text-blue-700 mb-4"></i>
          <h4 class="text-xl font-semibold mb-2">{$from} & Outstation Trips</h4>
          <p>Comfortable tempo travellers for weekend getaways, hill stations, Rajasthan, and more.</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
          <i class="bi bi-people-fill text-3xl text-blue-700 mb-4"></i>
          <h4 class="text-xl font-semibold mb-2">Group & Family Travel</h4>
          <p>Perfect for weddings, family tours, and large group travels from Karol Bagh {$from}.</p>
        </div>
        <div class="bg-white p-6 rounded shadow">
          <i class="bi bi-briefcase-fill text-3xl text-blue-700 mb-4"></i>
          <h4 class="text-xl font-semibold mb-2">Corporate Bookings</h4>
          <p>Safe and reliable tempo services for offices, events, and corporate clients.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Seater Options Section -->
	<section class="py-12 bg-white">
		<div class="max-w-7xl mx-auto px-4">
			<h2 class="text-2xl font-bold text-center mb-10">Available Tempo Travellers in Karol Bagh, {$from}</h2>
			
			<div class="grid md:grid-cols-3 gap-8">

				<!-- 12 Seater -->
				<div class="bg-gray-100 rounded shadow p-4">
					<img src="assets/images/seater/12-seater-tempo-traveller.jpg" alt="12 Seater Tempo Traveller {$from} to {$destination}" class="rounded w-full h-48 object-cover mb-4">
					<h3 class="text-lg font-semibold mb-2">12 Seater Tempo Traveller {$from} to {$destination}</h3>
					<p class="text-sm mb-4">Ideal for small groups and family trips, our 12-seater traveller ensures comfort with AC, pushback seats, and ample luggage space.</p>
					<div class="flex gap-3">
						<a href="tel:+919999029051" class="bg-blue-700 text-white px-4 py-2 rounded text-sm flex items-center gap-2 hover:bg-blue-800">
							<i class="bi bi-telephone-fill"></i> Call Now
						</a>
						<a href="https://wa.me/919999029051" class="bg-green-600 text-white px-4 py-2 rounded text-sm flex items-center gap-2 hover:bg-green-700">
							<i class="bi bi-whatsapp"></i> WhatsApp
						</a>
					</div>
				</div>

				<!-- 16 Seater -->
				<div class="bg-gray-100 rounded shadow p-4">
					<img src="assets/images/seater/16-seater-tempo-traveller.jpg" alt="16 Seater Tempo Traveller {$from} to {$destination}" class="rounded w-full h-48 object-cover mb-4">
					<h3 class="text-lg font-semibold mb-2">16 Seater Tempo Traveller {$from} to {$destination}</h3>
					<p class="text-sm mb-4">Perfect for medium-sized groups, this traveller offers a spacious ride with reclining seats, music system, and expert driver.</p>
					<div class="flex gap-3">
						<a href="tel:+919999029051" class="bg-blue-700 text-white px-4 py-2 rounded text-sm flex items-center gap-2 hover:bg-blue-800">
							<i class="bi bi-telephone-fill"></i> Call Now
						</a>
						<a href="https://wa.me/919999029051" class="bg-green-600 text-white px-4 py-2 rounded text-sm flex items-center gap-2 hover:bg-green-700">
							<i class="bi bi-whatsapp"></i> WhatsApp
						</a>
					</div>
				</div>

				<!-- 20 Seater -->
				<div class="bg-gray-100 rounded shadow p-4">
					<img src="assets/images/seater/20-seater-tempo-traveller.jpg" alt="20 Seater Tempo Traveller {$from} to {$destination}" class="rounded w-full h-48 object-cover mb-4">
					<h3 class="text-lg font-semibold mb-2">20 Seater Tempo Traveller {$from} to {$destination}</h3>
					<p class="text-sm mb-4">Ideal for tours, schools, and corporate trips. Features include AC, large windows, high roof, and extra space for luggage.</p>
					<div class="flex gap-3">
						<a href="tel:+919999029051" class="bg-blue-700 text-white px-4 py-2 rounded text-sm flex items-center gap-2 hover:bg-blue-800">
							<i class="bi bi-telephone-fill"></i> Call Now
						</a>
						<a href="https://wa.me/919999029051" class="bg-green-600 text-white px-4 py-2 rounded text-sm flex items-center gap-2 hover:bg-green-700">
							<i class="bi bi-whatsapp"></i> WhatsApp
						</a>
					</div>
				</div>

			</div>

			<!-- Second Row -->
			<div class="grid md:grid-cols-2 gap-8 mt-10">

				<!-- 9 Seater -->
				<div class="bg-gray-100 rounded shadow p-4">
					<img src="assets/images/seater/9-seater-tempo-traveller.jpg" alt="9 Seater Tempo Traveller {$from} to {$destination}" class="rounded w-full h-48 object-cover mb-4">
					<h3 class="text-lg font-semibold mb-2">9 Seater Tempo Traveller {$from} to {$destination}</h3>
					<p class="text-sm mb-4">Compact and budget-friendly option for smaller groups. Enjoy a smooth ride with AC and well-maintained interiors.</p>
					<div class="flex gap-3">
						<a href="tel:+919999029051" class="bg-blue-700 text-white px-4 py-2 rounded text-sm flex items-center gap-2 hover:bg-blue-800">
							<i class="bi bi-telephone-fill"></i> Call Now
						</a>
						<a href="https://wa.me/919999029051" class="bg-green-600 text-white px-4 py-2 rounded text-sm flex items-center gap-2 hover:bg-green-700">
							<i class="bi bi-whatsapp"></i> WhatsApp
						</a>
					</div>
				</div>

				<!-- 26 Seater -->
				<div class="bg-gray-100 rounded shadow p-4">
					<img src="assets/images/seater/26-seater-tempo-traveller.jpg" alt="26 Seater Tempo Traveller {$from} to {$destination}" class="rounded w-full h-48 object-cover mb-4">
					<h3 class="text-lg font-semibold mb-2">26 Seater Tempo Traveller {$from} to {$destination}</h3>
					<p class="text-sm mb-4">Large group solution for weddings, pilgrimages, and corporate outings. High roof, comfortable seating, and excellent space management.</p>
					<div class="flex gap-3">
						<a href="tel:+919999029051" class="bg-blue-700 text-white px-4 py-2 rounded text-sm flex items-center gap-2 hover:bg-blue-800">
							<i class="bi bi-telephone-fill"></i> Call Now
						</a>
						<a href="https://wa.me/919999029051" class="bg-green-600 text-white px-4 py-2 rounded text-sm flex items-center gap-2 hover:bg-green-700">
							<i class="bi bi-whatsapp"></i> WhatsApp
						</a>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Book Now Form Section -->
  <section class="py-16 bg-gray-50" id="contact">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold text-center text-yellow-500 mb-8">Book Now</h2>
      <form id="travelForm" class="max-w-3xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block mb-2 font-semibold">Full Name</label>
          <input type="text" name="fullName" placeholder="Your Name" class="w-full border px-4 py-2 rounded" required />
        </div>
        <div>
          <label class="block mb-2 font-semibold">Email Address</label>
          <input type="email" name="email" placeholder="you@example.com" class="w-full border px-4 py-2 rounded" required />
        </div>
        <div>
          <label class="block mb-2 font-semibold">Phone Number</label>
          <input type="tel" name="phone" placeholder="99999XXXXX" class="w-full border px-4 py-2 rounded" required />
        </div>
        <div>
          <label class="block mb-2 font-semibold">No. of Passengers</label>
          <input type="number" name="passengers" placeholder="e.g. 12" class="w-full border px-4 py-2 rounded" required />
        </div>
        <div>
          <label class="block mb-2 font-semibold">Start Travel Date</label>
          <input type="date" name="starttravelDate" class="w-full border px-4 py-2 rounded" required />
        </div>
        <div>
          <label class="block mb-2 font-semibold">End Travel Date</label>
          <input type="date" name="endtravelDate" class="w-full border px-4 py-2 rounded" required />
        </div>
        <div>
          <label class="block mb-2 font-semibold">Pickup Point</label>
          <input type="text" name="pickup" placeholder="e.g. Faridabad Sector 15" class="w-full border px-4 py-2 rounded" required />
        </div>
        <div>
          <label class="block mb-2 font-semibold">Destination</label>
          <input type="text" name="destination" placeholder="e.g. Manali, Haridwar" class="w-full border px-4 py-2 rounded" required />
        </div>
        <div class="md:col-span-2">
          <label class="block mb-2 font-semibold">Your Message</label>
          <textarea name="message" placeholder="Tell us your requirements..." rows="4" class="w-full border px-4 py-2 rounded" required></textarea>
        </div>
        <div class="md:col-span-2 text-center">
          <button type="submit" class="bg-yellow-500 text-black font-bold px-6 py-3 rounded">Submit Request</button>
        </div>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <div id="footer" class="mt-16"></div>
  
  <!-- JS Includes -->
  <script src="js/form.js"></script>
  <script src="js/include.js"></script>
  <script src="js/main.js"></script>
	<script src="js/sticky-buttons.js"></script>

</body>
</html>

HTML;

			// Save the file in the current directory
			if (file_put_contents($filename, $html)) {
      	echo "Created file: <a href='$filename'>$filename</a><br>";
			} else {
				echo "Failed to create file: $filename<br>";
			}
		}
  }
} else {
  echo "No data found.";
}

$conn->close();
?>
