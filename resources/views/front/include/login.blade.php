<form accept-charset="utf-8" class="form-login" id="login-form">
        @csrf
        <!-- Phone Number Input (Initially Visible) -->
        <div id="email-group">
            <fieldset class="mb_12">
                <input type="email" id="email" placeholder="Email Id*" required>
            </fieldset>
            <div class="error-message text-danger mt-2" style="display: none;"></div>
        </div>

        <!-- OTP Input (Initially Hidden) -->
        <div id="otp-group" style="display: none;">
            <fieldset class="mb_12">
                <input type="text" id="otp" placeholder="Enter OTP*" required>
            </fieldset>
            <div class="otp-timer text-muted small mt-2" style="display: none;"></div>
            <div class="error-message text-danger mt-2" style="display: none;"></div>
            <div class="success-message text-success mt-2" style="display: none;"></div>
        </div>

        <div class="bot">
            <div class="button-wrap">
                <!-- Request OTP Button (Initially Visible) -->
                <button class="subscribe-button tf-btn animate-btn bg-dark-2 w-100" type="button"
                    id="request-otp-button">
                    Request OTP
                </button>

                <!-- Verify OTP Button (Initially Hidden) -->
                <button class="subscribe-button tf-btn animate-btn bg-dark-2 w-100" type="button"
                    id="verify-otp-button" style="display: none;">
                    Verify OTP
                </button>

                <!-- Resend OTP Button (Initially Hidden) -->
                <button class="btn btn-link text-dark mt-2 w-100" type="button" id="resend-otp-button"
                    style="display: none;">
                    Resend OTP
                </button>
            </div>
        </div>
    </form>