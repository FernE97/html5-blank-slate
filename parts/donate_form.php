<form action="" class="donate__form form shortcode">
  <fieldset>
    <input type="radio" id="donate__once" name="donate" class="visuallyhidden" value="once">
    <input type="radio" id="donate__monthly" name="donate" class="visuallyhidden" value="monthly">
  </fieldset>
  <div class="donate__interval ">
    <label for="donate__once" class="donate__onceLabel donate__radioLabel js--frequency" data-interval="once">GIVE ONCE</label>
    <label for="donate__monthly" class="donate__monthlyLabel donate__radioLabel" data-interval="monthly">MONTHLY</label>
  </div>

  <div class="donate__formContent ">
      <h4 class="donate__formHeading ">Enter an amount to give</h4>
    <div class="donate__inputWrap ">
      <div class="donate__currencySymbol ">$</div>
        <input class="donate__input js--amount" value="0" type="text">
      <div class="donate__currency">USD</div>
    </div>
    <div class="donate__buttonWrap buttonWrap grid-x align-center">
      <a href="/donate" class="donate__button button js--donateButton cell small-12">Donate</a>
    </div>
  </div>
</form>