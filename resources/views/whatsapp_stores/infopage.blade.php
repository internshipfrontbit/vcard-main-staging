<!DOCTYPE html>
<html lang="gu">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>WhatsApp Store - 1 Click to Order | ₹1.5/day eCommerce Website</title>
		<meta name="description" content="Launch your own online store for just ₹1.5/day! Let customers order via WhatsApp in 1 click. Fast, simple & powerful eCommerce with vCard King." />
		<meta name="keywords" content="WhatsApp Store, 1 Click Order, Online Store, vCard King, eCommerce Website, WhatsApp Business, Digital Shop, ₹500 Website, Easy Order, 1.5 Rs.">
			<meta property="og:title" content="WhatsApp Store - 1 Click to Order | ₹1.5/day eCommerce Website" />
			<meta property="og:description" content="Your shop, your rules! Launch your WhatsApp Store with 1-click ordering. ₹1.5/day, full admin control and instant customer communication." />
			<meta property="og:image" content="https://staging.vcardking.com/uploads/wp-store-images/img-1.jpeg" />
			<meta property="og:url" content="https://staging.vcardking.com/" />
			<meta property="og:type" content="website" />
			<link rel="icon" href="https://staging.vcardking.com/uploads/wp-store-images/favicon.png" type="image/png">
				<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
					<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
						<style>
    :root {
      --blue: #1269B0;
      --purple: #501BB8;
      --gradient: linear-gradient(135deg, var(--blue), var(--purple));
      --text-color: #fff;
      --bg-dark: #0f0f10;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--bg-dark);
      color: var(--text-color);
      overflow-x: hidden;
    }

    header {
      text-align: center;
      padding: 100px 20px 60px;
      background: var(--gradient);
      background-size: 200% 200%;
      animation: animateGradient 15s ease infinite;
    }

    header h1 {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 15px;
      animation: fadeInDown 1.5s ease;
    }

    header p {
      font-size: 1.2rem;
      font-weight: 400;
      animation: fadeInUp 1.5s ease;
    }

    .language-selector {
  position: absolute;
  top: 20px;
  right: 20px;
  padding: 10px 32px 10px 16px; /* 👈 increased right padding */
  background: white;
  color: var(--purple);
  border-radius: 999px;
  font-weight: bold;
  border: none;
  box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D'10'%20height%3D'7'%20viewBox%3D'0%200%2010%207'%20xmlns%3D'http%3A//www.w3.org/2000/svg'%3E%3Cpath%20d%3D'M0%200l5%207%205-7z'%20fill%3D'%23501BB8'%20/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 12px center;
  background-size: 10px;
}

    .floating-cta {
      position: fixed;
      top: 20px;
      left: 20px;
      background: #25d366;
      color: #fff;
      padding: 12px 22px;
      border-radius: 999px;
      font-weight: 600;
      box-shadow: 0 6px 20px rgba(0,0,0,0.3);
      text-decoration: none;
      transition: transform 0.3s ease;
      z-index: 1000;
    }

    .floating-cta:hover {
      transform: scale(1.05);
      background: #25d366;
      color: #fff;
    }

    .container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 40px 20px;
    }

    .card {
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 20px;
      padding: 30px;
      margin-bottom: 40px;
      backdrop-filter: blur(10px);
      box-shadow: 0 20px 60px rgba(0,0,0,0.4);
      transition: all 0.4s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    h2 {
      font-size: 1.8rem;
      margin-bottom: 16px;
    }

    p {
      font-size: 1.05rem;
      line-height: 1.6;
      color: #ddd;
    }

    .btn {
      display: inline-block;
      margin: 12px 8px 0 0;
      padding: 14px 28px;
      font-weight: 600;
      border-radius: 12px;
      text-decoration: none;
      background: white;
      color: var(--purple);
      transition: 0.3s ease;
      box-shadow: 0 8px 24px rgba(0,0,0,0.2);
    }

    .btn:hover {
      background: var(--purple);
      color: #fff;
    }

    .demo-button-wrapper {
      display: flex;
      overflow-x: auto;
      gap: 16px;
      padding: 12px 6px;
      scroll-snap-type: x mandatory;
      -webkit-overflow-scrolling: touch;
    }
    
    .demo-button-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
  gap: 16px;
  padding-top: 12px;
}

    .demo-btn {
      flex: 0 0 auto;
      scroll-snap-align: center;
      font-size: 1.05rem;
      font-weight: bold;
      border: none;
      padding: 14px 26px;
      border-radius: 999px;
      color: white;
      cursor: pointer;
      min-width: 160px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      white-space: nowrap;
      text-align: center;
      background: gray;
    }

    .demo-btn:hover {
      transform: translateY(-5px) scale(1.05);
      box-shadow: 0 10px 24px rgba(0, 0, 0, 0.4);
    }

.demo-btn.cloth      { background: #6C5CE7; }     /* Deep Purple – Fashionable look */
.demo-btn.cake       { background: #FF7675; }     /* Soft Strawberry – Sweet & inviting */
.demo-btn.jewel      { background: #00B894; }     /* Emerald Green – Premium & elegant */
.demo-btn.beauty     { background: #FD79A8; }     /* Pink – Feminine & vibrant */
.demo-btn.food       { background: #0984E3; }     /* Blue – Fresh & trustworthy */
.demo-btn.ecommerce  { background: #FF6B6B; }     /* Coral Red – Energetic & bold */
.demo-btn.grocery    { background: #2ECC71; }     /* Fresh Green – Organic & natural */
.demo-btn.home       { background: #FAB1A0; color: #2d3436; }  /* Peach – Homely and soft */

    iframe {
      width: 100%;
      height: 320px;
      border-radius: 14px;
      border: none;
      margin-top: 20px;
    }

    footer {
      text-align: center;
      font-size: 0.95rem;
      color: #aaa;
      padding: 40px 20px;
    }
    
    .main-social-links {
    align-items: center;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
     
     .my-3 {
    margin-top: 1rem !important;
    margin-bottom: 1rem !important;
       
     }
     
     .main-social-links a {
    align-items: center;
    background: #fff;
    border-radius: 50%;
    display: flex;
    font-size: 20px;
    height: 37px;
    justify-content: center;
    margin: 5px;
    transition: .5s ease;
    width: 37px;
}

.main-social-links a:first-child{
  display: none;
}

.main-social-links a.facebook {
    color: #0a66ff;
}

.main-social-links a.instagram {
    color: #ee2a7b;
}

.main-social-links a.youtube {
    color: #fd0200;
}

.main-social-links a.linkedin {
    color: #0c66c2;
}

.main-social-links a.whatsapp {
    color: #2bd44b;
}

svg:not(:host).svg-inline--fa, svg:not(:root).svg-inline--fa {
    overflow: visible;
    box-sizing: content-box;
}

.svg-inline--fa {
    display: var(--fa-display, inline-block);
    height: 1em;
    overflow: visible;
    vertical-align: -.125em;
}

.slider-container {
  position: relative;
  overflow: hidden;
  border-radius: 16px;
}

.slider-track {
  display: flex;
  transition: transform 0.6s ease;
  width: 300%;
}

.slider-track img {
  width: 100%;
  flex-shrink: 0;
  object-fit: cover;
}

.slider-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(0, 0, 0, 0.4);
  color: white;
  border: none;
  padding: 10px 14px;
  cursor: pointer;
  font-size: 24px;
  z-index: 10;
  border-radius: 50%;
  backdrop-filter: blur(4px);
  transition: 0.3s;
}

.slider-btn:hover {
  background: rgba(0, 0, 0, 0.6);
}

.slider-btn.prev {
  left: 10px;
}

.slider-btn.next {
  right: 10px;
}

.top-logo {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

.top-logo img {
  width: 80px;
  height: 80px;
  border-radius: 20%;
  object-fit: contain;
  /*background: white;*/
  padding: 6px;
  box-shadow: 0 10px 24px rgba(0, 0, 0, 0.3);
  transition: transform 0.3s ease;
  
}

.top-logo img:hover {
  transform: scale(1.05);
}



    @keyframes animateGradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
						<!-- Google tag (gtag.js) -->
						<script async src="https://www.googletagmanager.com/gtag/js?id=G-09N4LSDC8Z"></script>
						<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-09N4LSDC8Z');
</script>
					</head>
					<body>
						<a href="https://staging.vcardking.com/whatsapp-store/jewellery-shop" target="_blenk" class="floating-cta">📲 
							<span data-key="order">डेमो देखें</span>
						</a>
						<select class="language-selector" id="language-selector">
							<option value="hi">Hindi</option>
                            <option value="gu">Gujarati</option>
							<option value="en">English</option>
						</select>
						<header>
							<a href="https://staging.vcardking.com" target="_blenk">
  
								<div class="top-logo">
									<img src="https://staging.vcardking.com/uploads/wp-store-images/vcard-king-logo.png" alt="Logo" />
								</div>
							</a>
							<br>
								<h1 data-key="headline" style="font-size:25px">🚀 ₹1.5 में वेबसाइट!</h1>
								<p data-key="subhead"  style="font-size:16px">📣 क्या आप सीधे व्हाट्सएप पर ऑर्डर चाहते हैं?</p>
							</header>
							<div class="container">
								<div class="card" data-aos="fade-up">
									<h2 data-key="title1"  style="font-size:20px">नमस्ते 🙏</h2>
									<p data-key="desc1">📱 आपकी अपनी प्रोफेशनल वेबसाइट है - जहां ग्राहक केवल 1 क्लिक में व्हाट्सएप पर ऑर्डर कर सकते हैं।</p>
									<br>
										<p data-key="desc2">🛠 एडमिन पैनल के साथ पूर्ण नियंत्रण</p>
										<br>
											<p data-key="desc3">💰 केवल ₹500 प्रति वर्ष (₹1.5/दिन)</p>
											<br>
												<a href="http://wa.me/917984847580?text=I want free demo." target="_blenk" class="btn" data-key="btn3">🎁 फ्री डेमो बुक करें</a>
												<a href="https://staging.vcardking.com/register" target="_blenk" class="btn" data-key="btn1">💼 WhatsApp स्टोर बनाएँ</a>
												<a href="tel:+917984847580" target="_blenk" class="btn" data-key="btn2">📞 +91-79848-47580</a>
											</div>
											<div class="card" data-aos="fade-up">
												<h2 data-key="title2" style="font-size:20px">✨ हर प्रकार के व्यवसाय के लिए बिल्कुल उपयुक्त।</h2>
												<div class="demo-button-grid">
													<button onclick="window.open('https://staging.vcardking.com/whatsapp-store/jewellery-shop')" target="_blenk"  class="demo-btn jewel">💍 
														<span data-key="jewel">ज्वेलरी</span>
													</button>
													<button onclick="window.open('https://staging.vcardking.com/whatsapp-store/home-made')"  target="_blenk" class="demo-btn home">🏡 
														<span data-key="home">होममेड</span>
													</button>
													<button onclick="window.open('https://staging.vcardking.com/whatsapp-store/beauty-shop')"  target="_blenk" class="demo-btn beauty">💄 
														<span data-key="beauty">ब्यूटी</span>
													</button>
													<button onclick="window.open('https://staging.vcardking.com/whatsapp-store/restaurant')"  target="_blenk" class="demo-btn food">🍽️ 
														<span data-key="food">रेस्टोरेंट</span>
													</button>
													<button onclick="window.open('https://staging.vcardking.com/whatsapp-store/cloth-shop')"  target="_blenk" class="demo-btn cloth">👗 
														<span data-key="cloth">कपड़े</span>
													</button>
													<button onclick="window.open('https://staging.vcardking.com/whatsapp-store/cakes-store')"  target="_blenk" class="demo-btn cake">🎂 
														<span data-key="cake">केक</span>
													</button>
													<button onclick="window.open('https://staging.vcardking.com/whatsapp-store/ecommerce')"  target="_blenk" class="demo-btn ecommerce">🛒 
														<span data-key="ecommerce">ई-कॉमर्स</span>
													</button>
													<button onclick="window.open('https://staging.vcardking.com/whatsapp-store/grocery-shop')"  target="_blenk" class="demo-btn grocery">🛍️ 
														<span data-key="grocery">किराना</span>
													</button>
												</div>
											</div>
											<div class="card" data-aos="fade-up">
												<h2 data-key="video2" style="font-size:20px">🤔 व्हाट्सएप स्टोर क्या है?</h2>
												<iframe 
  width="100%" 
  height="320" 
  src="https://www.youtube.com/embed/2ObRkDWmoHY" 
  title="What is WhatsApp Store?" 
  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
  allowfullscreen></iframe>
											</div>
											<div class="card" data-aos="fade-up">
												<h2 data-key="video1" style="font-size:20px">🔍 व्हाट्सएप स्टोर कैसे सेटअप करें?</h2>
												<iframe
    width="100%"
    height="320"
    src="https://www.youtube.com/embed/8GayRCaiMr8?si=H6xHPjvc2G7BSWam"
    title="Website Setup Video"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    allowfullscreen></iframe>
											</div>
											<div class="card" data-aos="fade-up">
												<div class="slider-container">
													<div class="slider-track" style="max-width: 100%;">
														<img style="max-width: 100%;" src="https://staging.vcardking.com/uploads/wp-store-images/img-1.jpeg" alt="Image 1" />
														<img style="max-width: 100%;" src="https://staging.vcardking.com/uploads/wp-store-images/img-2.jpeg" alt="Image 2" />
														<img style="max-width: 100%;" src="https://staging.vcardking.com/uploads/wp-store-images/img-3.jpeg" alt="Image 3" />
													</div>
													<button class="slider-btn prev" onclick="moveSlide(-1)">&#10094;</button>
													<button class="slider-btn next" onclick="moveSlide(1)">&#10095;</button>
												</div>
											</div>
											<div class="card" data-aos="fade-up">
												<h2 data-key="contact" style="font-size:20px">☎️ Contact Details</h2>
												<p>
													<a href="tel:+917984847580" target="_blenk" style="color:#fff;text-decoration:none !important">📞 +91 79848 47580 
														<a/>
													</p>
													<br>
														<p>
															<a href="https://maps.app.goo.gl/uGiQHLvZpyqD4jD68" target="_blenk" data-key="address" style="color:#fff;text-decoration:none !important">📍 G-44/45, प्लैटिनम पॉइंट, CNG पंप के सामने, मोटा वराछा, सूरत, गुजरात 394101
																<a/>
															</p>
															<br>
																<p>🇮🇳 Made in India</p>
															</div>
															<div class="card" data-aos="fade-up">
																<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.8875844704494!2d72.87481079999999!3d21.236305899999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f19898f33e5%3A0x625878e79c839089!2svCard%20King!5e0!3m2!1sen!2sin!4v1750405266340!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
															</div>
															<div class="main-social-links my-3">
																<a class="twitter" href="https://x.com/vCradKing11"  target="_blenk" >
																	<svg class="icon"
																		xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="19px" height="19px">
																		<path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>
																	</svg>
																</a>
																<a class="facebook" href="https://www.facebook.com/vcardking"  target="_blenk" >
																	<svg class="svg-inline--fa fa-facebook-square" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" role="img"
																		xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
																		<path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.3V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0 -48-48z"></path>
																	</svg>
																	<!-- <i class="fab fa-facebook-square"></i> Font Awesome fontawesome.com -->
																</a>
																<a class="instagram" href="https://www.instagram.com/vcardking/"  target="_blenk" >
																	<svg class="svg-inline--fa fa-instagram" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img"
																		xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
																		<path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
																	</svg>
																	<!-- <i class="fab fa-instagram"></i> Font Awesome fontawesome.com -->
																</a>
																<a class="youtube" href="https://www.youtube.com/@vCardKing"  target="_blenk" >
																	<svg class="svg-inline--fa fa-youtube" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" role="img"
																		xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
																		<path fill="currentColor" d="M549.7 124.1c-6.281-23.65-24.79-42.28-48.28-48.6C458.8 64 288 64 288 64S117.2 64 74.63 75.49c-23.5 6.322-42 24.95-48.28 48.6-11.41 42.87-11.41 132.3-11.41 132.3s0 89.44 11.41 132.3c6.281 23.65 24.79 41.5 48.28 47.82C117.2 448 288 448 288 448s170.8 0 213.4-11.49c23.5-6.321 42-24.17 48.28-47.82 11.41-42.87 11.41-132.3 11.41-132.3s0-89.44-11.41-132.3zm-317.5 213.5V175.2l142.7 81.21-142.7 81.2z"></path>
																	</svg>
																	<!-- <i class="fab fa-youtube"></i> Font Awesome fontawesome.com -->
																</a>
																<a class="linkedin" href="https://www.linkedin.com/in/vcardking/"  target="_blenk">
																	<svg class="svg-inline--fa fa-linkedin" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin" role="img"
																		xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
																		<path fill="currentColor" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
																	</svg>
																	<!-- <i class="fab fa-linkedin"></i> Font Awesome fontawesome.com -->
																</a>
																<a class="whatsapp" href="https://wa.me/917984847580"  target="_blenk">
																	<svg class="svg-inline--fa fa-whatsapp" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" role="img"
																		xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
																		<path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
																	</svg>
																	<!-- <i class="fab fa-whatsapp"></i> Font Awesome fontawesome.com -->
																</a>
															</div>
															<footer>
    © 2020-2025 WhatsApp Store by vCard King – All Rights Reserved
  </footer>
														</div>
														<a href="https://wa.me/917984847580?text=Hi vCard King, just visited your whatsapp store. May I know more?" style="position: fixed;right: 10px;bottom: 28px;">
															<img src="https://staging.vcardking.com/uploads/whatsapp.gif" style="height: 59px;width: 59px;">
															</a>
															<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
															<script>
    AOS.init();

    const translations = {
      gu: {
        headline: "🚀 દોઢ રૂપિયામાં તમારી વેબસાઈટ!",
        subhead: "📣 શું તમારે વોટ્સએપ પર સીધા ઓર્ડર જોઈએ છે?",
        title1: "નમસ્તે 🙏",
        desc1: "📱 તમારી પોતાની પ્રોફેશનલ વેબસાઈટ, જ્યાં ગ્રાહકો માત્ર 1 ક્લિકમાં વોટ્સએપ પર ઓર્ડર આપી શકે છે.",
        desc2: "🛠 એડમિન પેનલ સાથે પૂરું કંટ્રોલ",
        desc3: "💰 વર્ષના માત્ર ₹500 (₹1.5/દિવસ)",
        btn1: "💼 વોટ્સએપ સ્ટોર બનાવો",
        btn2: "📞 +91-79848-47580",
        btn3: "🎁 ફ્રી ડેમો બુક કરો",
        video1: "🔍 વોટ્સએપ સ્ટોર કેવી રીતે સેટઅપ કરવું?",
        video2: "🤔 વોટ્સએપ સ્ટોર શું છે?",
        contact: "📞 સંપર્ક વિગતો",
        title2: "✨ દરેક પ્રકારના બિઝનેસ માટે પરફેક્ટ છે.",
        cloth: "કપડાં",
        cake: "કેક",
        jewel: "જ્વેલરી",
        beauty: "બ્યુટી",
        food: "રેસ્ટોરન્ટ",
        ecommerce: "ઈ-કોમર્સ",
        home: "હોમમેડ",
        grocery: "ગ્રોસરી",
        order: "ડેમો જુઓ",
        wpstoreknow: "https://www.youtube.com/embed/XuqX6p1I0Bs",
        address: "📍 G-44/45, પ્લેટિનમ પોઈન્ટ, સામે. CNG પંપ, મોટા વરાછા, સુરત, ગુજરાત 394101"
      },
      hi: {
        headline: "🚀 ₹1.5 में वेबसाइट!",
        subhead: "📣 क्या आप सीधे व्हाट्सएप पर ऑर्डर चाहते हैं?",
        title1: "नमस्ते 🙏",
        desc1: "📱 आपकी अपनी प्रोफेशनल वेबसाइट है - जहां ग्राहक केवल 1 क्लिक में व्हाट्सएप पर ऑर्डर कर सकते हैं।",
        desc2: "🛠 एडमिन पैनल के साथ पूर्ण नियंत्रण",
        desc3: "💰 केवल ₹500 प्रति वर्ष (₹1.5/दिन)",
        btn1: "💼 व्हाट्सएप स्टोर बनाएं",
        btn2: "📞 +91-79848-47580",
        btn3: "🎁 फ्रीें डेमो बुक करें",
        video1: "🔍 व्हाट्सएप स्टोर कैसे सेट करें?",
        video2: "🤔 व्हाट्सएप स्टोर क्या है?",
        contact: "📞 संपर्क विवरण",
        title2: "✨ हर प्रकार के व्यवसाय के लिए उपयुक्त।",
        cloth: "कपड़े",
        cake: "केक",
        jewel: "ज्वेलरी",
        beauty: "ब्यूटी",
        food: "रेस्टोरेंट",
        ecommerce: "ई-कॉमर्स",
        home: "होममेड",
        grocery: "किराना",
        order: "डेमो देखें",
        wpstoreknow: "https://www.youtube.com/embed/2ObRkDWmoHY",
        address: "📍 G-44/45, प्लैटिनम पॉइंट, CNG पंप के सामने, मोटा वराछा, सूरत, गुजरात 394101"
      },
      en: {
        headline: "🚀 Your website for one and a half rupees!",
        subhead: "📣 Do you want to order directly on WhatsApp?",
        title1: "Hello 🙏",
        desc1: "📱 Your own professional website where customers can order in just 1 click on WhatsApp.",
        desc2: "🛠 Complete control with admin panel",
        desc3: "💰 Only ₹500 per year (₹1.5/day)",
        btn1: "💼 Create a WhatsApp store",
        btn2: "📞 +91-79848-47580",
        btn3: "🎁 Book a Free Demo",
        video1: "🎬 Video to Set Up Website",
        video2: "🤔 What is WhatsApp Store?",
        contact: "📞 Contact Details",
        title2: "✨ Perfect for every type of business.",
        cloth: "Clothes",
        cake: "Cake",
        jewel: "Jewellery",
        beauty: "Beauty",
        food: "Restaurant",
        ecommerce: "E-commerce",
        home: "Home Made",
        grocery: "Grocery",
        order: "Demo",
        wpstoreknow: "https://www.youtube.com/embed/XuqX6p1I0Bs",
        address: "📍 G-44/45, Platinum Point, opp. CNG Pump, Mota Varachha, Surat, Gujarat 394101"
      }
    };

    const langSelector = document.getElementById('language-selector');
    langSelector.addEventListener('change', function() {
      const lang = this.value;
      const data = translations[lang] || translations['hi'];
      document.querySelectorAll('[data-key]').forEach(el => {
        const key = el.getAttribute('data-key');
        if (data[key]) el.textContent = data[key];
      });
    });
  </script>
															<script>
  let currentSlide = 0;

  function moveSlide(direction) {
    const track = document.querySelector('.slider-track');
    const slides = document.querySelectorAll('.slider-track img');
    currentSlide += direction;

    if (currentSlide < 0) currentSlide = slides.length - 1;
    if (currentSlide >= slides.length) currentSlide = 0;

    track.style.transform = `translateX(-${currentSlide * 100}%)`;
  }

															</script>
														</body>
													</html>