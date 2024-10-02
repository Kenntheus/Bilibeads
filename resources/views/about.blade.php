 @extends('dashboard')

<style>
    .content-wrapper {
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        margin-top: 5%;
        margin-bottom: 50px; /* Adjust this value as needed */
    }

    
    .text-color-custom {
        color: #505C45;
    }

    .team-member-card {
        width: 300px;
        height: 360px; 
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
        margin: 10px;
        display: inline-block;
        text-align: center;
        position: relative; 
    }

    .team-member-img {
        width: 100%;
        border-radius: 10px;
        
    }

    .team-member-details {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.9); 
        padding: 10px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    .team-member-card:hover {
        transform: translateY(-10px);
        
    border: 2px solid #bfdaa4;
    }

    .team-member-details {
        font-size: 18px; 
        margin-bottom: 0px; 
        
    }

    .team-member-details p {
        font-size: 14px; 
        margin-bottom: 0; 
        line-height: 1.2; 
    }
</style>

<div class="container text-center content-wrapper">
    <h1 class="display-4 text-color-custom">About Bilibeads</h1>
    <p class="lead">Exploring and customizing vibrant bead accessories.</p>

    <div class="container">
        <p>
            Bilibeads is committed to providing a comprehensive platform where bead enthusiasts can explore,<br>purchase,
            and unleash their creativity through a wide range of bead-based products and craft ideas.
        </p>

        <h2 class="text-color-custom">Why Bilibeads?</h2>
        <p>
            At Bilibeads, we believe in the power of self-expression and individuality. Our platform is designed<br>to
            cater to the diverse tastes and preferences of those who appreciate the artistry of bead accessories.
        </p>

        <h2 class="text-color-custom">Join Us in the Bead Journey</h2>
        <p>
            Whether you're a seasoned bead enthusiast or just starting your journey, Bilibeads welcomes you<br>to explore
            the vibrant world of bead products and create accessories that reflect your unique style.
        </p>
    </div>

    <h1 class="text-center text-color-custom pt-5">Meet the Team</h1>
    <section class="about">
        <div class="container">
            <div class="main">
                <div class="team-member-card">
                    <img src="img/ken.jpg" alt="Team Member 1" class="team-member-img">
                    <div class="team-member-details">
                        <h5>Martheus Kenn Banaag</h5>
                        <p>Project Manager</p>
                    </div>
                </div>
                <div class="team-member-card">
                    <img src="img/me.jpg" alt="Team Member 2" class="team-member-img">
                    <div class="team-member-details">
                        <h5>Jorlan Prado</h5>
                        <p>Front-End Developer</p>
                    </div>
                </div>
                <div class="team-member-card">
                    <img src="img/gelo.jpg" alt="Team Member 2" class="team-member-img">
                    <div class="team-member-details">
                        <h5>Mark Gelo Rioflorido</h5>
                        <p>Front-End Developer</p>
                    </div>
                </div>
                <div class="team-member-card">
                    <img src="img/jean.jpg" alt="Team Member 2" class="team-member-img">
                    <div class="team-member-details">
                        <h5>Jean Collado</h5>
                        <p>Back-End Developer</p>
                    </div>
                </div>
                <div class="team-member-card">
                    <img src="img/james.jpg" alt="Team Member 2" class="team-member-img">
                    <div class="team-member-details">
                        <h5>James Andrei Ocampo</h5>
                        <p>Back-End Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Bootstrap JS and Popper.js (required for Bootstrap) --> --}}
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<div class="bottom">
    {{ View::make("frontend.footer") }}
</div>
