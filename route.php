<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticketing System - Login</title>
    <link rel="stylesheet" href="route.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap");

html,
body {
	width: 100%;
	height: 100%;
    background: #393e41;
	font-family: "Montserrat", sans-serif;
}

.centered {
	display: flex;
	align-items: center;
	justify-content: center;
	gap: 3rem;
	height: 100%;
}

.card {
	position: relative;
	height: 28rem;
	width: 20rem;
	aspect-ratio: 5 / 7;
	color: #ffffff;
	perspective: 50rem;
	
	.shadow {
		position: absolute;
		inset: 0;
		background:
			var(--url);
		background-size: cover;
		background-position: center;
		opacity: 0.8;
		filter: blur(2rem) saturate(0.9);
		box-shadow: 0 -1.5rem 2rem -0.5rem rgba(0, 0, 0, 0.7);
		transform: rotateX(var(--rotateX)) rotateY(var(--rotateY))
				translate3d(0, 2rem, -2rem);
	}

	.image {
		position: absolute;
		inset: 0;
		background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent 40%),
			var(--url);
		background-size: cover;
		background-position: center;
		mask-image: var(--url);
		mask-size: cover;
		mask-position: center;

		&.background {
			transform: rotateX(var(--rotateX)) rotateY(var(--rotateY))
				translate3d(0, 0, 0rem);
		}

		&.cutout {
			transform: rotateX(var(--rotateX)) rotateY(var(--rotateY))
				translate3d(0, 0, 4rem) scale(0.92);
			z-index: 3;
		}
	}

	.content {
		position: absolute;
		display: flex;
		flex-direction: column;
		justify-content: flex-end;
		inset: 0;
		padding: 3.5rem;

		transform: rotateX(var(--rotateX)) rotateY(var(--rotateY))
			translate3d(0, 0, 6rem);
		z-index: 4;
	}

	&::after,
	&::before {
		content: "";
		position: absolute;
		inset: 1.5rem;
		border: #e2c044 0.5rem solid;
		transform: rotateX(var(--rotateX)) rotateY(var(--rotateY))
			translate3d(0, 0, 2rem);
	}

	&::before {
		z-index: 4;
	}
	
	&.border-left-behind::before {
		border-left: transparent;
	}
	
	
	&.border-right-behind::before {
		border-right: transparent;
	}
	
	&.border-bottom-behind::before {
		border-bottom: transparent;
	}
}

h2 {
	font-size: 1.25rem;
	font-weight: 700;
	margin-bottom: 0.5rem;
	text-shadow: 0 0 2rem rgba(0, 0, 0, 0.5);
}

p {
	font-weight: 300;
	text-shadow: 0 0 2rem rgba(0, 0, 0, 0.5);
}

</style>
</head>

<body class="">
    <div class="aj-navbar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
                <img src="./assets/logo.png" alt="" width="60px" height="50px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="centered">
        <div class="card border-left-behind">
            <div class="shadow" style="--url: url('https://i.ibb.co/PM4ghD4/full.png')"></div>
            <div class="image cutout" style="--url: url('https://img.freepik.com/premium-photo/as-sun-begins-set-bright-yellow-bus-rolls-down-street-casting-warm-glow-buildings-trees-around-it-generative-ai_653286-793.jpg?w=740')"></div>
            <div class="content">
                <div class="screen-bus_name-time-seat">
                    <div class="screen-bus_name-wrap">
                        <span class="screen-bus_name">AK - TRAVELS</span>
                        <span class="screen-bys_type">A/c Sleeper </span>
                    </div>
                    <div class="screen-bus_time-wrap">
                        <div class="screen-bus_time">
                            <div class="screen-bus_start">9.00</div>
                            <div class="screen-bus_time-arrow-wrap">
                                <span class="screen-bus_time-arrow"></span>
                            </div>
                            <div class="screen-bus_end">12:00</div>
                        </div>
                        <div class="screen-bus_hrs">
                            <span>3 hrs</span>
                        </div>
                    </div>
                    <div class="screen-bus_seat-wrap">
                        <div>
                            <span class="screen-bus_count">13</span>
                            Seats Available
                        </div>
                    </div>
                </div>
                <div class="screen-bus_rating-price">
                    <div class="screen-bus_rating-price-row">
                        <div class="screen-bus_rating ">
                            <ul class="screen-bus_rating-row">
                                <!-- You can add rating stars here -->
                            </ul>
                        </div>
                        <div class="screen-bus_price">
                            <span><span>&#8377;</span>800</span>
                            <button type="button" class="btn btn-gradient">
                                <a href="./seat_selection.html?route_id=1&price=800" class="text-white">Select Seats</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bus 2 -->
        <div class="card border-right-behind border-bottom-behind">
            <div class="shadow" style="--url: url('https://i.ibb.co/DC0MbxS/m-full.png')"></div>
            <div class="image cutout" style="--url: url('./assets/busimage-gradient.jpg')"></div>
            <div class="content">
                <div class="screen-bus_name-time-seat">
                    <div class="screen-bus_name-wrap">
                        <span class="screen-bus_name">SRS Travels </span>
                        <span class="screen-bys_type">A/c Sleeper </span>
                    </div>
                    <div class="screen-bus_time-wrap">
                        <div class="screen-bus_time">
                            <div class="screen-bus_start">12.30</div>
                            <div class="screen-bus_time-arrow-wrap">
                                <span class="screen-bus_time-arrow"></span>
                            </div>
                            <div class="screen-bus_end">15:30</div>
                        </div>
                        <div class="screen-bus_hrs">
                            <span>3 hrs</span>
                        </div>
                    </div>
                    <div class="screen-bus_seat-wrap">
                        <div>
                            <span class="screen-bus_count">13</span>
                            Seats Available
                        </div>
                    </div>
                </div>
                <div class="screen-bus_rating-price">
                    <div class="screen-bus_rating-price-row">
                        <div class="screen-bus_rating ">
                            <ul class="screen-bus_rating-row">
                                <!-- You can add rating stars here -->
                            </ul>
                        </div>
                        <div class="screen-bus_price">
                            <span><span>&#8377;</span>800</span>
                            <button type="button" class="btn btn-gradient">
                                <a href="./seat_selection.html?route_id=2&price=800" class="text-white">Select Seats</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bus 3 -->
        <div class="card border-left-behind">
            <div class="shadow" style="--url: url('https://i.ibb.co/gSBp82C/b-full.png')"></div>
            <div class="image cutout" style="--url: url('https://img.freepik.com/premium-photo/bus-driving-sunset-along-road-against-backdrop-illuminated-buildings-city-rooftop-view_124507-81785.jpg?w=740')"></div>
            <div class="content">
                <div class="screen-bus_name-time-seat">
                    <div class="screen-bus_name-wrap">
                        <span class="screen-bus_name">ROYAL - Travels </span>
                        <span class="screen-bys_type">A/c Sleeper </span>
                    </div>
                    <div class="screen-bus_time-wrap">
                        <div class="screen-bus_time">
                            <div class="screen-bus_start">16.00</div>
                            <div class="screen-bus_time-arrow-wrap">
                                <span class="screen-bus_time-arrow"></span>
                            </div>
                            <div class="screen-bus_end">20:00</div>
                        </div>
                        <div class="screen-bus_hrs">
                            <span>4 hrs</span>
                        </div>
                    </div>
                    <div class="screen-bus_seat-wrap">
                        <div>
                            <span class="screen-bus_count">30</span>
                            Seats Available
                        </div>
                    </div>
                </div>
                <div class="screen-bus_rating-price">
                    <div class="screen-bus_rating-price-row">
                        <div class="screen-bus_rating ">
                            <ul class="screen-bus_rating-row">
                                <!-- You can add rating stars here -->
                            </ul>
                        </div>
                        <div class="screen-bus_price">
                            <span><span>&#8377;</span>1400</span>
                            <button type="button" class="btn btn-gradient">
                                <a href="./seat_selection.html?route_id=3&price=1400" class="text-white">Select Seats</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    const angle = 20;
        const rotateCard = window;

        const lerp = (start, end, amount) => {
            return (1 - amount) * start + amount * end;
        };

        const remap = (value, oldMax, newMax) => {
            const newValue = ((value + oldMax) * (newMax * 2)) / (oldMax * 2) - newMax;
            return Math.min(Math.max(newValue, -newMax), newMax);
        };

        window.addEventListener("DOMContentLoaded", (event) => {
            const cards = document.querySelectorAll(".card");
            cards.forEach((e) => {
                e.addEventListener("mousemove", (event) => {
                    const rect = e.getBoundingClientRect();
                    const centerX = (rect.left + rect.right) / 2;
                    const centerY = (rect.top + rect.bottom) / 2;
                    const posX = event.pageX - centerX;
                    const posY = event.pageY - centerY;
                    const x = remap(posX, rect.width / 2, angle);
                    const y = remap(posY, rect.height / 2, angle);
                    e.dataset.rotateX = x;
                    e.dataset.rotateY = -y;
                });

                e.addEventListener("mouseout", (event) => {
                    e.dataset.rotateX = 0;
                    e.dataset.rotateY = 0;
                });
            });

            const update = () => {
                cards.forEach((e) => {
                    let currentX = parseFloat(e.style.getPropertyValue('--rotateY').slice(0, -1));
                    let currentY = parseFloat(e.style.getPropertyValue('--rotateX').slice(0, -1));
                    if (isNaN(currentX)) currentX = 0;
                    if (isNaN(currentY)) currentY = 0;
                    const x = lerp(currentX, e.dataset.rotateX, 0.05);
                    const y = lerp(currentY, e.dataset.rotateY, 0.05);
                    e.style.setProperty("--rotateY", x + "deg");
                    e.style.setProperty("--rotateX", y + "deg");
                })
            }
            setInterval(update, 1000 / 60)
        });
</script>