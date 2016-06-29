// app.mainMenuHeight

var Backbone = require ('backbone');
var $ = require ('jquery');

module.exports = Backbone.View.extend({
  el: '#site-nav',

  openUp: function() {
    this.model.set({ 'menuHeight': this.$('span').height() });

    // $(document.body).attr('style', 'height: ' + this.model.get('menuHeight') + 'px');

    // take note of scroll position, and lock the masthead to that spot:
    var backgroundScroll = app.windowStatusView.model.get('vScrollPosition');
    this.model.set({ 'backgroundScroll': backgroundScroll });


    var navStyle = '';
    navStyle += 'height: ' + this.model.get('menuHeight') + 'px;';
    navStyle += 'top: ' + 0 + 'px;';

    this.$el.attr('style', navStyle);
    window.scrollTo(0, 0); // make sure that the top of the nav is visible!!!!

    // lock the page ( position:static )
    app.mainNavBackground.lockBackground( backgroundScroll );

  },

  closeDown: function() {

    var navStyle = '';
    navStyle += 'height: ' + 0 + 'px;';

    this.$el.attr('style', navStyle);

    this.model.set({'menuHeight': 0});
    if(this.model.get('backgroundScroll') !== ''){
      // Don't bother running this on page load:
      app.mainNavBackground.unlockBackground();
      window.scrollTo( 0, this.model.get('backgroundScroll') );
      // console.log('closing now !#@!');

      navStyle += 'top: ' + this.model.get('backgroundScroll') + 'px';

      this.$el.attr('style', navStyle);

    }
  },

  switchToLarger: function() {
    this.$el.removeAttr('style');
  }

});
