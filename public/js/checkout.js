let stripe = Stripe("pk_test_51Jx6KYDUPq2rGFP34yvQKqaB4UGuIS02zayHVDihCvgMmx95EcufynhpzCS9HUCB7Fzar7efixcOob3Nh9wJO39y00qEc9z9cM");

let secret_key = $('#stripe_key').val()
    // let return_url = $('#payment_key').data('return_url')
    //console.log(secret_key);
const options = {
    clientSecret: secret_key,
    // Fully customizable with appearance API.
    appearance: {
        theme: 'flat'
    },
};

// $(document).ready(function() {
//     $(" #method_payment input[name='payment']").click(function() { 

//         var radioValue = $("input[name='payment']:checked").val();

//         //console.log(radioValue);

//         //$("#payment-element").show();
//         // Set up Stripe.js and Elements to use in checkout form, passing the client secret obtained in step 2
//         const elements = stripe.elements(options);

//         // Create and mount the Payment Element
//         const paymentElement = elements.create('payment');
//         if (radioValue == 0) {
//             paymentElement.mount('#payment-element');
//             $("#payment-element").show();
//         } else {
//             $("#payment-element").hide();
//         }
//     });
// });


// Set up Stripe.js and Elements to use in checkout form, passing the client secret obtained in step 2
const elements = stripe.elements(options);

// Create and mount the Payment Element
const paymentElement = elements.create('payment');
paymentElement.mount('#payment-element');
checkStatus();

document
    .querySelector("#payment-form")
    .addEventListener("submit", handleSubmit);

async function handleSubmit(e) {
    e.preventDefault();
    //console.log(name)
    // let selector = $("#number_product")
    // let number = selector.val()
    // let product_id = selector.data('product_id')
    let name = e.target['name'].value
    let phone = e.target['phone'].value
    let address = e.target['address'].value
    let payment = e.target['payment'].value
    let note = e.target['note'].value
    let payment_type = e.target['payment'].value
    $.post("/?controller=checkout&action=index", {

            name: name,
            phone: phone,
            address: address,
            payment: payment,
            note: note,
        })
        .done(function() {

            if (payment_type == 0) { // 0: 'credit'
                setLoading(true);
                const { error } = stripe.confirmPayment({
                    elements,
                    confirmParams: {
                        return_url: "http://sneaker.local:8080/?controller=checkout&action=pay_success",
                    },
                });

                // This point will only be reached if there is an immediate error when
                // confirming the payment. Otherwise, your customer will be redirected to
                // your `return_url`. For some payment methods like iDEAL, your customer will
                // be redirected to an intermediate site first to authorize the payment, then
                // redirected to the `return_url`.
                if (error.type === "card_error" || error.type === "validation_error") {
                    showMessage(error.message);
                } else {
                    showMessage("An unexpected error occured.");
                }
            } else {
                window.location.replace("http://sneaker.local:8080/?controller=client&action=index")
            }
        });
    return true
}

// Fetches the payment intent status after payment submission
async function checkStatus() {
    const clientSecret = new URLSearchParams(window.location.search).get(
        secret_key
    );

    if (!clientSecret) {
        return;
    }

    const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

    switch (paymentIntent.status) {
        case "succeeded":
            showMessage("Payment succeeded!");
            break;
        case "processing":
            showMessage("Your payment is processing.");
            break;
        case "requires_payment_method":
            showMessage("Your payment was not successful, please try again.");
            break;
        default:
            showMessage("Something went wrong.");
            break;
    }
}

function setLoading(isLoading) {
    if (isLoading) {
        // Disable the button and show a spinner
        document.querySelector("#payment-form").disabled = true;
        document.querySelector("#spinner").classList.remove("hidden");
        document.querySelector("#button-text").classList.add("hidden");
    } else {
        document.querySelector("#submit").disabled = false;
        document.querySelector("#spinner").classList.add("hidden");
        document.querySelector("#button-text").classList.remove("hidden");
    }
}

function showMessage(messageText) {
    const messageContainer = document.querySelector("#payment-message");

    messageContainer.classList.remove("hidden");
    messageContainer.textContent = messageText;

    setTimeout(function() {
        messageContainer.classList.add("hidden");
        messageText.textContent = "";
    }, 4000);
}