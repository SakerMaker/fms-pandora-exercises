<a id="readme-top"></a>

<br />
<div align="center">

  <h3 align="center">Pandora FMS Prueba</h3>

</div>

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a>
      <ul>
        <li><a href="#exercise-1">Exercise 1</a></li>
        <li><a href="#exercise-2">Exercise 2</a></li>
      </ul>
    </li>
    
  </ol>
</details>

## Getting Started

First, you'll need to install Docker on your machine and clone this repository.

### Prerequisites

* Cloning this repository
  ```sh
  git clone https://github.com/sakermaker/fms-pandora-exercises
  ```

* Docker Compose
  ```sh
  docker compose -f docker-compose.yml up -d
  ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- USAGE EXAMPLES -->
## Usage

### Exercise 1
When you first load the project ([http](http://localhost/)) you'll find exercise 2 index.
You can visit exercise 1 in the top right nav bar.

You'll simply see the output from the CSV file (you can find it in www/exercise1/scores.csv).

![Website Screenshot](https://i.imgur.com/V2A34T9.png)

To see exercise contents, please access www/exercise1. File index.php contains a brief summary of how it works.

### Exercise 2
When you first load the project ([http](http://localhost/)) you'll find exercise 2 index.

You can fill the required details.

![Website Screenshot](https://i.imgur.com/YVNuRXA.png)

It will autofill the appointment type (either first-time or second check).
The website will send advices in case of bad formatting or wrong data on the form.

![Website Screenshot](https://i.imgur.com/4bB5Xiz.png)

If you've previously visited the website and asked for an appointment, the second time you fill the form, it will auto-select second check option.

![Website Screenshot](https://i.imgur.com/ZsLARwg.png)

To see exercise contents, please access www. File index.php contains a brief summary of how it works.

<p align="right">(<a href="#readme-top">back to top</a>)</p>