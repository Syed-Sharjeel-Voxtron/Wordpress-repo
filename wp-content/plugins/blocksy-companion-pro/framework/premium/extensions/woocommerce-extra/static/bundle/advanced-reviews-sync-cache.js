!function(){"use strict";function t(t,e){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){if("undefined"==typeof Symbol||!(Symbol.iterator in Object(t)))return;var n=[],r=!0,o=!1,a=void 0;try{for(var c,i=t[Symbol.iterator]();!(r=(c=i.next()).done)&&(n.push(c.value),!e||n.length!==e);r=!0);}catch(t){o=!0,a=t}finally{try{r||null==i.return||i.return()}finally{if(o)throw a}}return n}(t,e)||n(t,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function e(t){return function(t){if(Array.isArray(t))return r(t)}(t)||function(t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(t))return Array.from(t)}(t)||n(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function n(t,e){if(t){if("string"==typeof t)return r(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);return"Object"===n&&t.constructor&&(n=t.constructor.name),"Map"===n||"Set"===n?Array.from(t):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?r(t,e):void 0}}function r(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=new Array(e);n<e;n++)r[n]=t[n];return r}(0,window.ctFrontend.registerDynamicChunk)("blocksy_ext_woo_extra_advanced_reviews_sync_cache",{mount:function(n){var r=n.querySelectorAll(".ct-review-vote");if(r.length){var o=e(new Set(Array.from(r).map((function(t){return+t.dataset.commentId}))));fetch("".concat(ct_localizations.ajax_url,"?action=ct_sync_votes"),{method:"POST",body:JSON.stringify({comments_ids:o}),headers:{Accept:"application/json","Content-Type":"application/json"}}).then((function(t){return t.json()})).then((function(e){var n=e.votes,r=e.user;Object.entries(n).forEach((function(e){var n=t(e,2),o=n[0],a=n[1];if(a){var c=document.querySelector('.ct-review-vote[data-comment-id="'.concat(o,'"][data-vote="up"]')),i=document.querySelector('.ct-review-vote[data-comment-id="'.concat(o,'"][data-vote="down"]'));if(c&&i){var u=a.up,l=void 0===u?[]:u,s=a.down,d=void 0===s?[]:s;l.includes(r)&&(c.dataset.buttonState="active",i.dataset.buttonState=""),d.includes(r)&&(c.dataset.buttonState="",i.dataset.buttonState="active");var f=c.closest(".ct-review-votes"),v=f.querySelector(".ct-review-total-count"),y=f.querySelector(".ct-review-upvote-count");f.querySelector(".ct-review-vote-count").dataset.count=l.length,v.innerHTML=l.length+d.length,y.innerHTML=l.length}}}))}))}}})}();