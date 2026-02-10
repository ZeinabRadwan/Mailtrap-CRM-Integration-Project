<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>إعادة تعيين كلمة المرور - قلاري</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        />

        <style>
            body {
                font-family: "Effra", Tahoma, Arial, sans-serif;
                background-color: #f9fafb;
                margin: 0;
                padding: 0;
                color: #2c3e50;
                -webkit-text-size-adjust: 100%;
            }

            .email-container {
                max-width: 600px;
                margin: 40px auto;
                background-color: #ffffff;
                border-radius: 12px;
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
                border: 1px solid #e1e8f0;
                overflow: hidden;
            }

            .email-header {
                display: flex;
                justify-content: space-between;
                padding: 40px 40px 20px;
                border-bottom: 1px solid #e1e8f0;
                gap: 30px;
                background-color: #f7f9fb;
                align-items: center; 
            }

            .header-quote {
                line-height: 1.5;
                text-align: left;
                max-height: 130px;
                overflow-y: auto;
                user-select: text;
                font-size: 17px;
                font-weight: bold;
                color: #51688f;
                flex: 1;
            }

            .email-header img.logo {
                max-width: 160px;
                height: auto;
                display: block;
                flex-shrink: 0;
            }

            .email-content {
                padding: 30px 40px;
                background-color: #fff;
                line-height: 1.6;
            }

            h1 {
                font-size: 24px;
                color: #e8932d;
                margin-bottom: 18px;
                font-weight: 700;
            }

            p {
                font-size: 16px;
                margin: 16px 0;
                color: #34495e;
            }

            .reset-btn {
                display: block;
                width: fit-content;
                margin: 30px auto;
                background-color: #324265;
                color: white !important;
                font-weight: 700;
                font-size: 14px;
                padding: 12px 30px;
                border-radius: 12px;
                text-decoration: none;
                text-align: center;
                box-shadow: 0 4px 12px rgba(50, 66, 101, 0.5);
                transition: background-color 0.3s ease;
            }

            .reset-btn:hover {
                background-color: #283850;
            }

            .footer {
                background-color: #f7f9fb;
                padding: 30px 40px;
                border-top: 1px solid #e1e8f0;
                color: #7f8c9a;
                font-size: 14px;
                text-align: center;
            }

            .footer-logo {
                max-width: 140px;
                margin: 0 auto 20px;
                display: block;
            }

            .footer p {
                margin: 0 0 24px;
                font-weight: 600;
                color: #34495e;
            }

            .contacts {
                display: flex;
                justify-content: center;
                gap: 60px;
                flex-wrap: wrap;
                margin-bottom: 30px;
            }

            .contact-item {
                min-width: 140px;
                text-align: center;
            }

            .contact-item img.flag {
                border-radius: 8px;
                margin-bottom: 14px;
                width: 50px;
                height: auto;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .contact-info {
                font-size: 15px;
                color: #e8932d;
                font-weight: 600;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                direction: ltr;
            }

            .contact-info a {
                color: #e8932d;
                text-decoration: none;
                font-weight: 600;
            }

            .contact-info img.icon {
                width: 20px;
                height: 20px;
            }

            .social-list {
                display: flex;
                align-items: center;
                margin-top: 1rem;
                justify-content: center;
            }

            .social-list a {
                background-color: #f8a94e;
                color: #fff;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 30px;
                height: 30px;
                border-radius: 100%;
                transition: 0.3s;
                font-size: 16px;
                margin: 0 0.5rem;
                text-decoration: none;
            }

            strong {
                color: #5c8deb;
            }

            @media (max-width: 600px) {
                .email-container {
                    margin: 20px 15px;
                }

                .email-content {
                    padding: 20px 25px;
                }

                h1 {
                    font-size: 22px;
                }

                .reset-btn {
                    font-size: 16px;
                    padding: 12px 30px;
                }

                .footer {
                    padding: 20px 25px;
                    font-size: 13px;
                }

                .contacts {
                    gap: 30px;
                }
            }
        </style>
    </head>

    <body>
        <div class="email-container">
            <div class="email-header" role="banner">
                <img
                    class="logo"
                    src="https://cdn.glary.sa/gmc-assets/img/logo/header-logo.gif"
                    alt="قلاري للإدارة السحابية"
                    style="max-width: 160px; height: auto; flex-shrink: 0"
                />
                <div class="header-quote" aria-label="نبذة عن قلاري">
                    إنطلق بتجارتك
                </div>
            </div>

            <div class="email-content">
                <h1>مرحباً زينب عبدالغفار،</h1>
                <p>
                    لقد طلبت إعادة تعيين كلمة المرور الخاصة بحسابك في قلاري.
                    لإكمال العملية، اضغط على الزر أدناه:
                </p>

                <a
                    href="#"
                    class="reset-btn"
                    role="button"
                    aria-label="زر إعادة تعيين كلمة المرور"
                >
                    إعادة تعيين كلمة المرور
                </a>

                <p>
                    إذا لم تطلب إعادة تعيين كلمة المرور، يمكنك تجاهل هذه الرسالة
                    بأمان.
                </p>
                <p>شكرًا لاختيارك <strong>قلاري للإدارة السحابية!</strong></p>
            </div>

            <div class="footer">
                <img
                    class="footer-logo"
                    src="https://cdn.glary.sa/gmc-assets/img/logo/header-logo.gif"
                    alt="قلاري للإدارة السحابية"
                />

                <p>
                    لأي استفسار، تواصل معنا في أي وقت عبر جميع وسائل الاتصال.
                    فريق قلاري الإبداع جاهز لمساعدتك دائماً.
                </p>

                <div class="contacts">
                    <!-- السعودية -->
                    <div class="contact-item">
                        <img
                            class="flag"
                            src="https://flagcdn.com/sa.svg"
                            alt="علم السعودية"
                        />
                        <div class="contact-info">
                            <img
                                class="icon"
                                src="https://cdn-icons-png.flaticon.com/24/733/733585.png"
                                alt="واتساب"
                            />
                            <a
                                href="https://wa.me/966553888879"
                                target="_blank"
                                rel="noopener"
                                >+966 553888879</a
                            >
                        </div>
                    </div>

                    <!-- البحرين -->
                    <div class="contact-item">
                        <img
                            class="flag"
                            src="https://flagcdn.com/bh.svg"
                            alt="علم البحرين"
                        />
                        <div class="contact-info">
                            <img
                                class="icon"
                                src="https://cdn-icons-png.flaticon.com/24/733/733585.png"
                                alt="واتساب"
                            />
                            <a
                                href="https://wa.me/973333888791"
                                target="_blank"
                                rel="noopener"
                                >+973 333888791</a
                            >
                        </div>
                    </div>
                </div>

                <div class="social" aria-label="وسائل التواصل الاجتماعي">
                    <p>أو من خلال وسائل التواصل الاجتماعي:</p>
                    <div class="social-list">
                        <a
                            href="https://www.facebook.com/GlaryAPP"
                            target="_blank"
                        >
                            <i class="fa-brands fa-facebook-f"></i
                        ></a>
                        <a
                            href="https://www.instagram.com/glaryapp/"
                            target="_blank"
                            ><i class="fa-brands fa-instagram"></i
                        ></a>
                        <a href="https://twitter.com/GlaryAPP" target="_blank">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                        <a
                            href="https://www.youtube.com/@GlaryAPP"
                            target="_blank"
                            ><i class="fa-brands fa-youtube"></i
                        ></a>
                        <a
                            href="https://www.linkedin.com/in/glaryapp/"
                            target="_blank"
                            ><i class="fa-brands fa-linkedin-in"></i
                        ></a>
                        <a href="https://tiktok.com/@glaryapp" target="_blank"
                            ><i class="fa-brands fa-tiktok"></i
                        ></a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
