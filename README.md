# Growth360-wordpress
This respository contains the theme files that make the wordpress site look like the mockup that I was asked to recreate.

# Background
Used a child theme and a parent theme to accomplish this design. The parent theme used is Understrap, this is an open source project that combines Underscores and Bootstrap 4. You can learn more here:

Understrap - https://understrap.com/
Underscores - https://underscores.me/

# Things to check out
None of the files in the 'Understrap' folder were created or edited by me. These are just included for reference.
All php files found in 'Understrap-child' are files that I have edited / created to make the theme work.
Some important information will not be found in this repository as some code was added to the actual site once it was setup.

# Plugins Used
Used the [Yoast SEO](https://yoast.com/wordpress/plugins/seo/) plugin to assist with breadcrumbs and other SEO features.

# Code that was added to the site:
While logged in to the backend of the site as an administrator:

**Appearance > Widgets > Left Sidebar > Custom Html Widget:**
```html
<!-- quote-box -->
<div id="quote-form" class="col-12 text-center">
  <span class="quote-subtitle">Made For Your Life </span>
  <h1 class="quote-title text-center">Get A Quote</h1>
  <form class="quote-form-inner">
    <div class="row align-items-center form-group">
      <label class="col-5" for="quote-gender">GENDER</label>
        <input type="radio" name="gender" id="gender-m-btn" value="male">
        <label class="col-3 btn quote-btn" for="gender-m-btn">MALE</label>
        <input type="radio" name="gender" id="gender-f-btn" value="female">
        <label class="col-3 offset-1 btn quote-btn" for="gender-f-btn">FEMALE</label>
    </div>
    <div class="row align-items-center form-group">
      <label class="col-5" for="DOB">DOB</label>
      <input id="quote-dob" class="col-7 form-control active" type="date" name="dob" value="MM/DD/YYYY" data-trigger="focus">
    </div>
    <div class="row align-items-center form-group">
      <label class="col-5" for="quote-state">STATE</label>
      <select class="col-7 form-control" id="quote-state">
        <option selected value="select">--------</option>
        <option value="Alabama">Alabama</option>
        <option value="Alaska">Alaska</option>
        <option value="Arizona">Arizona </option>
        <option value="Arkansas">Arkansas</option>
        <option value="California">California</option>
        <option value="Colorado">Colorado</option>
        <option value="Connecticut">Connecticut</option>
        <option value="Delaware">Delaware</option>
        <option value="District of Columbia">District of Columbia</option>
        <option value="Florida">Florida</option>
        <option value="Georgia">Georgia</option>
        <option value="Hawaii">Hawaii</option>
        <option value="Idaho">Idaho</option>
        <option value="Illinois">Illinois</option>
        <option value="Indiana">Indiana</option>
        <option value="Iowa">Iowa</option>
        <option value="Kansas">Kansas</option>
        <option value="Kentucky">Kentucky</option>
        <option value="Louisiana">Louisiana</option>
        <option value="Maine">Maine</option>
        <option value="Maryland">Maryland</option>
        <option value="Massachusetts">Massachusetts</option>
        <option value="Michigan">Michigan</option>
        <option value="Minnesota">Minnesota</option>
        <option value="Mississippi">Mississippi</option>
        <option value="Missouri">Missouri</option>
        <option value="Montana">Montana</option>
        <option value="Nebraska">Nebraska</option>
        <option value="Nevada">Nevada</option>
        <option value="New Hampshire">New Hampshire</option>
        <option value="New Jersey">New Jersey</option>
        <option value="New Mexico">New Mexico</option>
        <option value="New York">New York</option>
        <option value="North Carolina">North Carolina</option>
        <option value="North Dakota">North Dakota</option>
        <option value="Ohio">Ohio</option>
        <option value="Oklahoma">Oklahoma</option>
        <option value="Oregon">Oregon</option>
        <option value="Pennsylvania">Pennsylvania</option>
        <option value="Rhode Island">Rhode Island</option>
        <option value="South Carolina">South Carolina</option>
        <option value="South Dakota">South Dakota</option>
        <option value="Tennessee">Tennessee</option>
        <option value="Texas">Texas</option>
        <option value="Utah">Utah</option>
        <option value="Vermont">Vermont</option>
        <option value="Virginia">Virginia</option>
        <option value="Washington">Washington</option>
        <option value="West Virginia">West Virginia</option>
        <option value="Wisconsin">Wisconsin</option>
        <option value="Wyoming">Wyoming</option>
      </select>
    </div>
    <div class="row align-items-center form-group">
      <label class="col-5" for="quote-coverage">COVERAGE</label>
      <select class="col-7 form-control" id="quote-coverage">
        <option value="select">--------</option>
        <option value="individual">Individual</option>
        <option value="couple">Couple</option>
        <option value="family">Family</option>
      </select>
    </div>
    <div class="row align-items-center form-group">
      <label class="col-5" for="DOB">SMOKER</label>
      <input type="radio" name="smoker" id="smoker-y-btn" value="yes">
        <label class="col-2 btn quote-btn" for="smoker-y-btn">Y</label>
      <input type="radio" name="smoker" id="smoker-n-btn" value="no">
        <label class="col-2 offset-1 btn quote-btn" for="smoker-n-btn">N</label>
    </div>
    <div class="row align-items-center form-group">
      <label class="col-5" for="quote-firstname">FIRST NAME</label>
      <input id="quote-firstname" class="col-7 form-control" type="text" name="firstname">
    </div>
    <div class="row align-items-center form-group">
      <label class="col-5" for="quote-lastname">LAST NAME</label>
      <input id="quote-lasttname" class="col-7 form-control" type="text" name="lastname">
    </div>
    <div class="row align-items-center form-group">
      <label class="col-5" for="quote-email">EMAIL</label>
      <input id="quote-email" class="col-7 form-control" type="text" name="lastname">
    </div>
    <div class="row align-items-center form-group">
      <button id="quote-submit" type="submit" class="btn btn-outline-dark">SUBMIT</button>
    </div>
  </form>
</div>
```
        
**Appearance > Widgets > Hero Canvas > Custom Html Widget:**
```html
<div class="hero">
  <div class="col-sm-7 col-lg-5 hero-left">
    <div class="hero-text-outer">
      <div class="hero-text-inner">
        <h1 class="hero-text">Providing assurance <span style="display: block;">in your <span class="hero-text-highlight">life insurance.</span></span></h1>
      </div>
    </div>
    <img class="img-fluid rounded-right hero-image" src="https://gregbopp.com/growth360wp/wp-content/uploads/2018/10/family-selfie-01.jpg" alt="" />
  </div>
  <div class="col-sm-5 col-lg-7 .d-xs-none .d-sm-block hero-right"></div>
</div>
```
 
**Appearance > Widgets > Top Full > Custom Html Widget:**
```html
<div class="row below-hero">
  <div class="col-sm-12 col-md-4 col-lg-4 offset-lg-1 slider-left">
    <span class="slider-offer">WHAT WE OFFER</span>
    <div class="divider-wrap"><hr class="divider divider-left divider-default"></div>
    <h2 class="slider-header">Term Life Insurance</h2>
    <p class="slider-text">Lorem ipsum dolor sit amet, consectetuer adipiscing
      elit, sed diam nonummy nibh euismod
      tincidunt ut laoreet dolore magna aliquam erat
      volutpat. Ut wisi enim ad ut laoreet dolore
      magna aliquam erat volutpat. Lorem ipsum.
    </p>
    <button type="button" class="btn btn-secondary more-btn">MORE</button>
  </div>  
  <div class="col-sm-12 col-md-8 col-lg-7" id="carousel-below-hero">
    <div class="slider">
      <div>
        <img class="img-fluid" src="https://gregbopp.com/growth360wp/wp-content/uploads/2018/10/child-shoulders.jpg" />
      </div>
      <div>
        <img class="img-fluid" src="https://gregbopp.com/growth360wp/wp-content/uploads/2018/10/biking-01.jpeg" />
      </div>
      <div>
        <img class="img-fluid" src="https://gregbopp.com/growth360wp/wp-content/uploads/2018/10/family-home-01.jpg" />
      </div>
      <div>
        <img class="img-fluid" src="https://gregbopp.com/growth360wp/wp-content/uploads/2018/10/retired-01.jpeg" />
      </div>
      <div>
        <img class="img-fluid" src="https://gregbopp.com/growth360wp/wp-content/uploads/2018/10/driving-01.jpg" />
      </div>
    </div>
  </div>
</div>
```

**Appearance > Widgets > Footer Full > Custom Html Widget:**
```html
<div class="row">
  <div id="footer" class="col-md-8 offset-md-4 order-4">
    <div class="col-12">
      <div class="row align-items-center text-center">
        <div class="col-sm-5 order-sm-2 spacer-tf spacer-bh">
          <ul class="social-icon-list list-inline">
            <li class="list-inline-item">
              <a href="http://facebook.com/" target="_blank">
                <i class="flaticon-facebook-logo"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="http://twitter.com/" target="_blank">
                <i class="flaticon-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="http://www.linkedin.com/" target="_blank">
                <i class="flaticon-linkedin-sign"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="http://wwww.pinterest.com/" target="_blank">
                <i class="flaticon-pinterest-logo"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="http://www.instagram.com/" target="_blank">
                <i class="flaticon-instagram"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-sm-2 order-sm-1 spacer-tf spacer-bh">
          <img id="footer-logo" src="//gregbopp.com/growth360wp/wp-content/uploads/2018/10/vitalogy-tree.svg" alt="company logo">
        </div>
        <div class="col-sm-5 order-sm-0 spacer-tf spacer-bh">
          <p><a href="#">Growth360 ©2018 </a> / <a href="#">Legal</a> / <a href="#">Privacy</a></p>
        </div>              
      </div>
    </div>
  </div>
</div>
```

**Home Page also contains static content:**
```html
<h1 id="companies" class="company-header text-center">Companies You Can Rely On</h1>
<div class="row company-slider">
  <div><img class="img-fluid" src="https://via.placeholder.com/250x150?text=1" /></div>
  <div><img class="img-fluid" src="https://via.placeholder.com/250x150?text=2" /></div>
  <div><img class="img-fluid" src="https://via.placeholder.com/250x150?text=3" /></div>
  <div><img class="img-fluid" src="https://via.placeholder.com/250x150?text=4" /></div>
  <div><img class="img-fluid" src="https://via.placeholder.com/250x150?text=5" /></div>
  <div><img class="img-fluid" src="https://via.placeholder.com/250x150?text=6" /></div>
  <div><img class="img-fluid" src="https://via.placeholder.com/250x150?text=7" /></div>
  <div><img class="img-fluid" src="https://via.placeholder.com/250x150?text=8" /></div>
  <div><img class="img-fluid" src="https://via.placeholder.com/250x150?text=9" /></div>
  <div><img class="img-fluid" src="https://via.placeholder.com/250x150?text=10" /></div>
</div><!--.company-slider-->
<div class="row">
  <button id="blog-category-btn" class="btn btn-secondary" type="submit">BROWSE BY CATEGORY</button>
</div>
<div class="row">
  <h1 class="post-summary-header">Recent Posts</h1>
</div>
<div class="w-100"></div>
[recentposts]
<div class="w-100"></div>
<div class= "row">
  <a role="button" class="btn btn-secondary post-summary-btn" href="https://gregbopp.com/growth360wp/blog/">LOAD MORE</a>
</div>
<div class="row">
  <h2 class="cta-heading text-center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</h2>
  <div class="col-12 call-to-action">
    <span class="cta-subheading">HIGH RISK LIFE INSURANCE</span>
    <div class="divider-wrap"><hr class="divider divider-center divider-white"></div>
    <p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum.
    </p>
    <button id="cta-btn" type="submit" class="btn btn-outline-dark">SEE QUOTES</button>
  </div><!--.call-to-action-->
</div><!--.row-->
<div class="row">
  <h1 class="post-summary-header">Featured Posts</h1>
</div>
<div class="w-100"></div>
[featuredposts]
<div class="w-100"></div>
<div class= "row">
  <a role="button" class="btn btn-secondary post-summary-btn" href="https://gregbopp.com/growth360wp/category/featured/">LOAD MORE</a>
</div>
<div class="row">          
  <div id="about-us" class="col-12">
    <div class="row align-items-center">
      <div class="col-2 about-left">
        <span class="about-left-text">ABOUT US</span>
      </div><!--.about-left-->
      <div class="col-10 about-right">
        <p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum.
        </p>
        <button id="about-btn" type="submit" class="btn btn-outline-dark">LEARN MORE</button>
      </div><!--.about-right-->
    </div><!--.row-->
  </div><!--#about-us-->
</div><!--.row-->
```
