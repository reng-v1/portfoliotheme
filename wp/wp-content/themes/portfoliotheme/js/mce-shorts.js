/**
*  Adds a few shortcode buttons to the TinyMCE WYSIWYG editor
**/

// store reference to our shortcodes
var shortcodeValues = [
  { text: 'Blog Post Preview', value: 'blogpostpreview' },
  { text: 'Ask Feed', value: 'askfeed' },
  { text: 'Book Preview', value: 'bookpreview' },
  { text: 'Product Snapshot', value: 'productsnapshot' },
  { text: 'Mindful Moment Preview', value: 'mindfulmoment' },
  { text: 'Article Snapshot', value: 'articlesnapshot' }
];

// plugin
(function() {

  tinymce.create('tinymce.plugins.mlnshortcodes', {
    init : function(ed, url) {
       ed.addButton('mlnshortcodes', {
          title : 'Short Codes',
          type: 'listbox',
          text: 'MLN Shortcodes',
          onselect : function(e) {
            var v = e.control._value;
            switch ( v ) {
              case 'blogpostpreview':
                var specificPost = confirm( 'Would you like to filter the post being displayed? If not, the most recent post will display in this preview.'  );
                if ( specificPost ) {
                  var id       = prompt("Filter by post ID");
                  var name     = prompt("Enter a post's slug name to filter by post name");
                  var category = prompt("Enter a category's slug name to filter by Category Name");
                }

                var shortCodeString = '['+v; //start shortcode string
                if ( id ) shortCodeString += ' id="'+id+'"';
                if ( name ) shortCodeString += ' name="'+name+'"';
                if ( category ) shortCodeString += ' category="'+category+'"';
                shortCodeString += ']'; // end shortcode string

                ed.execCommand('mceInsertContent', false, shortCodeString);
                break;
              case 'askfeed':
                var qty = prompt("Quantity of Q&As to display:","1");

                var shortCodeString = '['+v; //start shortcode string
                if ( qty ) shortCodeString += ' qty="'+qty+'"';
                shortCodeString += ']'; // end shortcode string

                ed.execCommand('mceInsertContent', false, shortCodeString);
                break;
              case 'bookpreview':
                // do something
                break;
              case 'productsnapshot':
                // do something
                break;
              case 'mindfulmoment':
                // do something
                break;
              case 'articlesnapshot':
                // do something
                break;
              default:
                // do nothing
            }
          },
          values: shortcodeValues
       });
    },
    createControl : function(n, cm) {
       return null;
    },
    getInfo : function() {
       return {
          longname : "MLN Shortcodes",
          author : 'Coran Spicer',
          authorurl : 'http://www.ninjamultimedia.com',
          version : "1.0"
       };
    }

  });
  tinymce.PluginManager.add('mlnshortcodes', tinymce.plugins.mlnshortcodes);
})();

