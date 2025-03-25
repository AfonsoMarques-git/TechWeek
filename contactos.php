<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="css/contactos.css" />
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container">
        <?php include 'header.php'; ?>
    </div>
    <div class="contact-container">
        <form id="contactForm" action="https://api.web3forms.com/submit" method="POST" class="contact-form">
            <input type="hidden" name="access_key" value="2cd62894-bead-4900-885d-5039f6430c57">
            <input type="hidden" name="subject" value="Formulário de Contacto">
            <input type="hidden" name="from_name" value="TechWeek2025">
            <input type="hidden" id="successMessage" name="successMessage" value="">
            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <div class="success-message">Formulário enviado com sucesso!</div>
            <?php endif; ?>
            <div class="form">
                <div class="contact-info">
                    <h3 class="title">Contacte-nos</h3>
                    <p class="text">Se tem alguma dúvida a cerca do evento ou quer dar o seu feedback preencha este
                        formulário.</p>

                    <div class="info">
                        <div class="information">
                            <i class='bx bxs-map'></i>
                            <p>Escola Profissional De Braga</p>
                        </div>
                        <div class="information">
                            <i class='bx bxl-gmail'></i>
                            <p>techweek2025@epb.pt</p>
                        </div>
                        <div class="information">
                            <i class='bx bxs-phone'></i>
                            <p>+351 918 709 985 / +351 253 203 860</p>
                        </div>
                    </div>

                    <div class="social-media">
                        <p>Conecte-se connosco :</p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/epb.pt" target="_blank">
                                <i class='bx bxl-facebook'></i>
                            </a>
                            <a href="https://www.instagram.com/epb.pt/" target="_blank">
                                <i class='bx bxl-instagram'></i>
                            </a>
                            <a href="https://wa.me/351918709985" target="_blank">
                                <i class='bx bxl-whatsapp'></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <div class="input-container">
                        <input type="text" name="nome" class="input" placeholder="Nome" />
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" placeholder="Email" />
                    </div>
                    <div class="input-container">
                        <input type="tel" name="telemovel" class="input" placeholder="Contacto Telefónico" />
                    </div>
                    <div class="input-container textarea">
                        <textarea name="mensagem" class="input" placeholder="Mensagem"></textarea>
                    </div>
                    <input type="submit" value="Enviar" class="btn" />
                </div>
            </div>
        </form>
    </div>

    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2986.4364798270276!2d-8.429211009725027!3d41.53814571259102!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd24fececbfdaea3%3A0xf0e2389973067be0!2sEscola%20Profissional%20de%20Braga!5e0!3m2!1spt-PT!2spt!4v1742316089822!5m2!1spt-PT!2spt"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div id="success-popup" class="popup" style="display: none;">
        <span class="popup-message">Formulário enviado com sucesso!</span>
        <button id="close-popup">Fechar</button>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>