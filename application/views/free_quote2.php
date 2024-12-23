
<script src="https://smtpjs.com/v3/smtp.js"></script>
<div class="container">
        <div class="row g-6">
            <div class="col-lg-6 wow fadeInUp pb-5" data-wow-delay="0.1s">
                <img class="img-fluid mb-8" src="https://via.placeholder.com/400" alt="Food Delivery">
            </div>
            <div class="col-lg-6 mt-5 pb-5">
                <h3 class="text-danger text-uppercase mt-3" style="font-style: italic;">Get A Free Quote...!!</h3>
                <div class="bg-light text-center p-5 wow fadeIn mt-5 pt-5" data-wow-delay="0.5s">
                    <form id="sendOTPForm">
                        <div class="row g-3">
                            <div class="col-12 col-sm-12">
                                <input type="date" class="form-control border-0" placeholder="Date" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-12">
                                <input type="text" class="form-control border-0" placeholder="Name" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-12">
                                <input type="email" id="email" name="email" class="form-control border-0" placeholder="Email" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-12">
                                <input type="number" name="phone" class="form-control border-0" placeholder="Phone No" style="height: 55px;" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100 py-3">GET OTP</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sendOTPForm = document.getElementById('sendOTPForm');

            if (sendOTPForm) {
                sendOTPForm.addEventListener('submit', async (e) => {
                    e.preventDefault();

                    const email = sendOTPForm.elements.email.value;
                    const phone = sendOTPForm.elements.phone.value;

                    if (!email || !phone) {
                        alert("Please fill in both email and phone number.");
                        return;
                    }

                    // Generate OTP (4 digits)
                    const otp = generateOtp();

                    // Simple client-side validation for email format
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        alert("Please enter a valid email address.");
                        return;
                    }

                    // Send OTP via SMTP.js
                    const result = await sendOtpToEmail(email, otp);

                    if (result === "OK") {
                        alert(`OTP sent successfully to ${email}`);
                        window.location.href = 'verifyOTP.html';  // Redirect to OTP verification page
                    } else {
                        alert(`Error sending OTP: ${result}`);
                    }
                });
            }
        });

        // Function to generate OTP (4 digits)
        function generateOtp() {
            return Math.floor(1000 + Math.random() * 9000);
        }

        // Function to send OTP via SMTP.js
        function sendOtpToEmail(email, otp) {
            return new Promise((resolve, reject) => {
                Email.send({
                    SecureToken: "your-secure-token-here",  // Replace with your SMTPJS secure token
                    To: email,
                    From: "vaishnavirabade0110@gmail.com",  // Replace with your email address
                    Subject: "Your OTP Code",
                    Body: `Your OTP code is: ${otp}`
                }).then(function (message) {
                    resolve(message);
                }).catch(function (error) {
                    reject(error);
                });
            });
        }
    </script>