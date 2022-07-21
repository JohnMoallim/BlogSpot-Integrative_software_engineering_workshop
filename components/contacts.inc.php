<div class="vh-100 text-dark bg-opacity-50 contacts_page" id="contacts_page">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="contact_container">
                    <div class="avatar">
                        <a href="https://www.linkedin.com/in/ori-moscovitz/">
                            <img src="img/ori_linkedin.jpg" alt="OriMoscovitz" />
                        </a>
                    </div>
                    <div class="content">
                        <h1>Ori Moscovitz</h1>
                    </div>
                </div>
            </div>
            <div class="col">
            </div>
            <div class="col">
                <div class="contact_container">
                    <div class="avatar">
                        <a href="https://www.linkedin.com/in/shaked-spector-50603719b/">
                            <img src="img/shaked_linkedin.jpg" alt="ShakedSpector" />
                        </a>
                    </div>
                    <div class="content">
                        <h1>Shaked Spector</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                <div class="contact_container">
                    <div class="avatar">
                        <a href="https://www.linkedin.com/in/johnmoallim/">
                            <img src="img/john_linkedin.jpg" alt="JohnMoallim" />
                        </a>
                    </div>
                    <div class="content">
                        <h1>John Moallim</h1>
                    </div>
                </div>
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row justify-content-end">

        </div>
    </div>
</div>

<style type="text/css">
    .contacts_page
    {
        padding-top:5%;
        background-image: url('img/contacts_bg_pic.jpeg');
        background-repeat: no-repeat;
        background-size: cover;
    }
    h1 {
        font-size: 24px;
        margin: 10px 0 0 0;
        font-weight: bold;
        color: black;
        font-family: Gisha;

    }

    .contact_container {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .avatar {
        width: 250px;
        height: 250px;
        box-sizing: border-box;
        border: 5px white solid;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
        transform: translatey(0px);
        animation: float 6s ease-in-out infinite;
    img { margin-right: 50px; width: 100%; height: auto; }
    }

    span a {
        font-size: 18px;
        color: #cccccc;
        text-decoration: none;
        margin: 0 10px;
        transition: all 0.8s ease-in-out;
    &:hover {
         color: #ffffff;
     }
    }

    @keyframes float {
        0% {
            box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
            transform: translatey(0px);
        }
        50% {
            box-shadow: 0 25px 15px 0px rgba(0,0,0,0.2);
            transform: translatey(-20px);
        }
        100% {
            box-shadow: 0 5px 15px 0px rgba(0,0,0,0.6);
            transform: translatey(0px);
        }
    }


    .content {
        width: 100%;
        max-width: 600px;
        padding: 20px 40px;
        box-sizing: border-box;
        text-align: center;
    }
</style>