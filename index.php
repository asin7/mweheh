<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HEhehe</title>
  <?php date_default_timezone_set("Asia/Tokyo");
  if (isset($_POST['love'])) {
    $fp = fopen('hidden.txt', 'a');
    fwrite($fp, " <div> <p><span>Time</span> : " . date("d-M-Y (H:i)") . "</p> <p><span>affection</span> : " . $_POST["love"] . "</p> <p><span>Miss</span> : " . $_POST["missing"] . "</p> <p><span>Message</span> : " . $_POST["message"] . "</p> </div> ");
    fclose($fp);
  }
  if (isset($_GET['answer'])) {
    $fp = fopen('hidden.txt', 'r');
    echo ' <link rel="stylesheet" href="sstyle.css" /> </head> <body> <header> </header> ';
    while (!feof($fp)) {
      echo fgets($fp);
    }
    echo ' </body> </html> ';
    fclose($fp);
    die;
  } ?>
  <script src="/script/Sweet.js"></script>
  <script src="/script/scriptQ.js"></script>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="preload">
    <p>Wait Loading . . .</p>
  </div>
  <div class="content">
    <button>Click here</button>
  </div>
  <script>
    music = "/bgm/ready.mp3";

    window.addEventListener("load", (event) => {
      var load = document.querySelector(".preload");
      load.style = "opacity: 0; transition: .5s ease all;";
      setTimeout(() => {
        load.style.display = "none";
      }, 500);
    });
    document.querySelector("button").addEventListener("click", start);
    var mymusic = new Audio(music);
    mymusic.loop = true;
    
    async function start() {
      mymusic.play();
      wagaForm();
      inputAffection = document.querySelectorAll("input")[0];
      inputMiss = document.querySelectorAll("input")[1];
      inputMessage = document.querySelectorAll("input")[2];
      await pop.fire({

        imageUrl: "/gif/wave.gif",
        title: "Hello My little girl!",
        text: "I have question for you",

      });
      await pop.fire({

        imageUrl: "/gif/pls.gif",
        title: "Answer honestly pls..",

      });
      await pop.fire({

        imageUrl: "/gif/mad.gif",
        title: "Dont you dare to lie",

      });
      loveNo();
    }

    function loveNo() {
      pop
        .fire({
          showDenyButton: true,

          imageUrl: "/gif/uwu-but.gif",
          title: "Do you love me?",
          denyButtonText: "No!",
          confirmButtonText: "I love you",

        })
        .then((e) => {
          if (e.isConfirmed) {
            pop
              .fire({

                imageUrl: "/gif/loved-junlemon.gif",
                title: "I love you too!",

              })
              .then(() => {
                howMuch();
              });
          } else {
            pop
              .fire({
                showDenyButton: true,

                imageUrl: "/gif/sad.gif",
                title: "Are you sure you dont?",
                denyButtonText: "In your dream!",
                confirmButtonText: "I love you ofc",

              })
              .then((e) => {
                if (e.isConfirmed) {
                  pop
                    .fire({

                      imageUrl: "/gif/happy.gif",
                      title: "I love you too!!!",

                    })
                    .then(howMuch);
                } else {
                  pop
                    .fire({

                      imageUrl: "/gif/bersad.gif",
                      title: "Aweee if you say so :(",

                    })
                    .then(missNo);
                }
              });
          }
        });
    }

    async function howMuch() {
      var {
        value: love
      } = await pop.fire({

        title: "How much do you love me?",
        inputLabel: "Between 1 - 100",

        input: "range",
        confirmButtonText: "Send",
        inputValue: 50,
        inputAttributes: {
          min: 1,
          max: 100,
          step: 1,
        },
      });
      inputAffection.setAttribute("value", love + "%");
      await pop
        .fire({

          imageUrl: "/gif/berhappy.gif",
          title: "thank you for loving me " + love + "%",

        })
        .then(() => {
          missNo();
        });
    }

    async function missNo() {
      await pop
        .fire({
          showDenyButton: true,

          imageUrl: "/gif/shy.gif",
          title: "Do you miss me?",
          denyButtonText: "No!",
          confirmButtonText: "Of course :(",

        })
        .then((e) => {
          if (e.isConfirmed) {
            inputMiss.setAttribute("value", "Yes");
            pop
              .fire({

                imageUrl: "/gif/proud.gif",
                title: "I miss you too!!",

              })
              .then(anyMessage);
          } else {
            pop
              .fire({

                imageUrl: "/gif/saddo.gif",
                title: "aweeee i guess am just a dust",

              })
              .then(anyMessage);
          }
        });
    }

    async function anyMessage() {
      await pop.fire({

        imageUrl: "/gif/idea.gif",
        title: "Last one!",

      });
      await pop
        .fire({
          showDenyButton: true,

          imageUrl: "/gif/conf.gif",
          title: "Do you have any message for me?",
          denyButtonText: "No!",
          confirmButtonText: "Of course",

        })
        .then(async (e) => {
          if (e.isConfirmed) {
            var {
              value: message
            } = await pop.fire({

              imageUrl: "/gif/nani.gif",
              title: "What it is?",
              input: "text",

            });
            if (message) {
              inputMessage.setAttribute("value", message);
            } else {
              await pop.fire({

                imageUrl: "/gif/sigh.gif",
                title: "Nevermind then",

              });
            }
          } else {
            await pop.fire({

              imageUrl: "/gif/siggi.gif",
              title: "Alright if u dont have",

            });
          }
        });
      sd();
      lastMessage();
    }

    async function lastMessage() {
      await pop.fire({

        imageUrl: "/gif/happ.gif",
        title: "Thanks for answering honestly",

      });
      await pop.fire({

        imageUrl: "/gif/kiss.gif",
        title: "chuuuu",

      });
    }
  </script>
</body>

</html>