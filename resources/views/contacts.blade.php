<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/contacts.css') }}" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <span class="big-circle"></span>
        <img src="img/shape.png" class="square" alt="" />
        <div class="form">
            <div class="contact-info">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('/images/writelogo.png') }}"alt="">
                </a>
                <h3 class="title">Fale conosco</h3>
                <p class="text">
                    Estamos aqui para cada passo. Se você estiver alguma duvida, precise de uma assistência, ou queira
                    dar um feedback, nossa equipe de suporte ao cliente está pronta para ajudar. Todo nosso time está
                    aqui para ajudar.
                </p>

                <div class="social-media">
                    <p>Entre em contato conosco via:</p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="https://wa.me/5511999149423?text=Olá,%20gostaria%20de%20falar%20com%20vocês"
                            target="_blank">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>

                </div>
            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form action="index.html" autocomplete="off">
                    <h3 class="title">Nos envie uma mensagem</h3>
                    <div class="input-container">
                        <input type="text" name="name" class="input" />
                        <label for="">Nome</label>
                        <span>Nome</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" />
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="phone" class="input" />
                        <label for="">Telefone</label>
                        <span>Telefone</span>
                    </div>
                    <div class="input-container textarea">
                        <textarea name="message" class="input"></textarea>
                        <label for="">Mensagem</label>
                        <span>Mensagem</span>
                    </div>
                    <input type="submit" value="Send" class="button" />
                </form>
            </div>
        </div>
    </div>
   <!--Footer-->
   <footer class="footer">
        <div class="footer-container">
            <div class="footer-row">
                <div class="footer-col">
                    <h4>Dejavu</h4>
                    <ul>
                        <li>
                            <p>Agora você pode planejar, priorizar e acompanhar suas atividades diárias de forma fácil e
                                eficiente. Menos stress, mais produtividade! </p>
                        </li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Sobre</h4>
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('contacts') }}">Contato</a></li>
                        <li><a href="{{ route('about-us') }}">Sobre</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Sobre-Nós</h4>
                    <ul>
                        <li><a
                                href="https://linktr.ee/Dejavu?fbclid=PAZXh0bgNhZW0CMTEAAabGfx4kNTHa0phtPDyny1ZAzAECH2b77p-4Su1iL6ocpHOZIFIpZxYQfFw_aem_Cg3NWZqrG1AzPhLRB3C46Q">Linktree</a>
                        </li>
                        <li style="visibility: hidden;"><a href="#">Termos&Condições</a></li>
                        <li style="visibility: hidden;"><a href="#">Suporte</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href=" https://www.instagram.com/oficialmeudejavu/ "><i class="bi bi-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/dejavu-undefined-3b9035338/"><i
                                class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Footer-->

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="{{ asset('js/contacts.js') }}"></script>
</body>

</html>