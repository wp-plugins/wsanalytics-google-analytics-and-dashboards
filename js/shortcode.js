/*
 * Tinymce plugin for WSAnalytics
 */

(function() {
   tinymce.create('tinymce.plugins.WSAnalytics', {

      init : function(editor, url) {

            editor.addButton( 'WSAnalyticsstats', {
                  title: 'WSAnalytics Shortcodes',
                  type: 'menubutton',
                  icon: 'icon WSAnalytics-shortcodes-icon',
                  menu: [
                         /** Simple **/
                           {
                              text: 'Simple',
                              onclick: function() {

                                    editor.windowManager.open( {

                                    title: 'WSAnalytics Simple Shortcodes: Returns selected data',
                                    body: [
                                       {
                                          type: 'listbox',
                                          name: 'metrics',
                                          label: 'Metrics :',
                                          'values': [
                                             {text: 'Users', value: 'ga:users'},
                                             {text: 'New Users', value: 'ga:newUsers'},
                                             {text: 'Percent New Sessions', value: 'ga:percentNewSessions'},
                                             {text: '----- Session Management -----', value: ''},
                                             {text: 'Sessions', value: 'ga:sessions'},
                                             {text: 'Bounces', value: 'ga:bounces'},
                                             {text: 'BounceRate', value: 'ga:bounceRate'},
                                             {text: 'Session Duration', value: 'ga:sessionDuration'},
                                             {text: 'Avg Session Duration', value: 'ga:avgSessionDuration'},
                                             {text: 'Percent New Sessions', value: 'ga:percentNewSessions'},
                                             {text: '----- Page Tracking -----', value: ''},
                                             {text: 'Page Value', value: 'ga:pageValue'},
                                             {text: 'Entrances', value: 'ga:entrances'},
                                             {text: 'Page views', value: 'ga:pageviews'},
                                             {text: 'Unique Pageviews', value: 'ga:uniquePageviews'},
                                             {text: 'Exits', value: 'ga:exits'},
                                             {text: 'Exit Rate', value: 'ga:exitRate'},
                                             {text: 'Time On Page', value: 'ga:timeOnPage'},
                                             {text: 'Avg Time On Page', value: 'ga:avgTimeOnPage'}
                                          ]
                                       },
                                       {
                                          type: 'listbox',
                                          name: 'permission_view',
                                          label: 'Visible to :',
                                          'values': [
                                             {text: 'Everyone', value: ""},
                                             {text: 'Administrator', value: 'administrator'},
                                             {text: 'Editor', value: 'editor'},
                                             {text: 'Author', value: 'author'},
                                             {text: 'Contributor', value: 'contributor'}
                                          ]
                                       }
                                    ],
                                    onsubmit: function( e ) {
                                       editor.insertContent( '[WSAnalytics-stats metrics="' + e.data.metrics + '" permission_view="' + e.data.permission_view + '"]');
                                    }
                                 });
                              }
                           },

                           /** Advanced **/
                           {
                              text: 'Advanced',
                              onclick: function() {
                                 tb_show("WSAnalytics Advanced Shortcodes: Use it according to your needs.", "admin-ajax.php?action=WSAnalytics_advanced_shortcode");
                                 tinymce.DOM.setStyle(["TB_overlay", "TB_window", "TB_load"], "z-index", "999999");                              
                                 var tb = jQuery("#TB_window");
                              if (tb)
                                 {
                                    var tbCont = tb.find('#TB_ajaxContent');
                                    tbCont.css({ width : 'auto', height : 'auto',background : '#efefef' });
                           
                                 }
                              }
                           }
                     ]
            });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "WSAnalytics Shortcodes - Show selected analytics",
            author : 'Adnan',
            authorurl : 'http://wp-WSAnalytics.com/',
            infourl : 'http://wp-WSAnalytics.com/',
            version : "1.1"
         };
      }
   });

   tinymce.PluginManager.add('WSAnalyticsstats', tinymce.plugins.WSAnalytics);
})();