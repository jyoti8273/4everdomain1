(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[63,59,60],{100:function(e,t,n){"use strict";n.d(t,"a",(function(){return o})),n.d(t,"b",(function(){return r}));var c=n(4);let a;!function(e){e.ADD_EVENT_CALLBACK="add_event_callback",e.REMOVE_EVENT_CALLBACK="remove_event_callback"}(a||(a={}));const o={addEventCallback:function(e,t){let n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:10;return{id:Object(c.uniqueId)(),type:a.ADD_EVENT_CALLBACK,eventType:e,callback:t,priority:n}},removeEventCallback:(e,t)=>({id:t,type:a.REMOVE_EVENT_CALLBACK,eventType:e})},s={},r=function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:s,{type:t,eventType:n,id:c,callback:o,priority:r}=arguments.length>1?arguments[1]:void 0;const l=e.hasOwnProperty(n)?new Map(e[n]):new Map;switch(t){case a.ADD_EVENT_CALLBACK:return l.set(c,{priority:r,callback:o}),{...e,[n]:l};case a.REMOVE_EVENT_CALLBACK:return l.delete(c),{...e,[n]:l}}}},111:function(e,t,n){"use strict";n.d(t,"a",(function(){return o}));var c=n(26),a=n(20);const o=e=>Object(c.a)(e)?JSON.parse(e)||{}:Object(a.a)(e)?e:{}},118:function(e,t,n){"use strict";n.d(t,"b",(function(){return d})),n.d(t,"a",(function(){return m}));var c=n(0),a=n(6),o=n(3),s=n(17),r=n.n(s),l=n(100),i=n(217);const u=Object(c.createContext)({onPaymentProcessing:()=>()=>()=>{},onPaymentSetup:()=>()=>()=>{}}),d=()=>Object(c.useContext)(u),m=e=>{let{children:t}=e;const{isProcessing:n,isIdle:s,isCalculating:d,hasError:m}=Object(a.useSelect)(e=>{const t=e(o.CHECKOUT_STORE_KEY);return{isProcessing:t.isProcessing(),isIdle:t.isIdle(),hasError:t.hasError(),isCalculating:t.isCalculating()}}),{isPaymentReady:b}=Object(a.useSelect)(e=>{const t=e(o.PAYMENT_STORE_KEY);return{isPaymentProcessing:t.isPaymentProcessing(),isPaymentReady:t.isPaymentReady()}}),{setValidationErrors:p}=Object(a.useDispatch)(o.VALIDATION_STORE_KEY),[v,y]=Object(c.useReducer)(l.b,{}),{onPaymentSetup:f}=(e=>Object(c.useMemo)(()=>({onPaymentSetup:Object(i.a)("payment_setup",e)}),[e]))(y),h=Object(c.useRef)(v);Object(c.useEffect)(()=>{h.current=v},[v]);const{__internalSetPaymentProcessing:g,__internalSetPaymentIdle:O,__internalEmitPaymentProcessingEvent:j}=Object(a.useDispatch)(o.PAYMENT_STORE_KEY);Object(c.useEffect)(()=>{!n||m||d||(g(),j(h.current,p))},[n,m,d,g,j,p]),Object(c.useEffect)(()=>{s&&!b&&O()},[s,b,O]),Object(c.useEffect)(()=>{m&&b&&O()},[m,b,O]);const E={onPaymentProcessing:Object(c.useMemo)(()=>function(){return r()("onPaymentProcessing",{alternative:"onPaymentSetup",plugin:"WooCommerce Blocks"}),f(...arguments)},[f]),onPaymentSetup:f};return Object(c.createElement)(u.Provider,{value:E},t)}},143:function(e,t,n){"use strict";var c=n(0);n(210),t.a=()=>Object(c.createElement)("span",{className:"wc-block-components-spinner","aria-hidden":"true"})},210:function(e,t){},217:function(e,t,n){"use strict";n.d(t,"a",(function(){return a}));var c=n(100);const a=(e,t)=>function(n){let a=arguments.length>1&&void 0!==arguments[1]?arguments[1]:10;const o=c.a.addEventCallback(e,n,a);return t(o),()=>{t(c.a.removeEventCallback(e,o.id))}}},27:function(e,t,n){"use strict";n.d(t,"a",(function(){return s}));var c=n(0),a=n(14),o=n.n(a);function s(e){const t=Object(c.useRef)(e);return o()(e,t.current)||(t.current=e),t.current}},273:function(e,t,n){"use strict";var c=n(13),a=n.n(c),o=n(0),s=n(62),r=n(5),l=n.n(r),i=n(143);n(274),t.a=e=>{let{className:t,showSpinner:n=!1,children:c,variant:r="contained",...u}=e;const d=l()("wc-block-components-button","wp-element-button",t,r,{"wc-block-components-button--loading":n});return Object(o.createElement)(s.a,a()({className:d},u),n&&Object(o.createElement)(i.a,null),Object(o.createElement)("span",{className:"wc-block-components-button__text"},c))}},274:function(e,t){},294:function(e,t,n){"use strict";n.d(t,"a",(function(){return c}));const c=function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"",t=arguments.length>1?arguments[1]:void 0;return e.includes("is-style-outline")?"outlined":e.includes("is-style-fill")?"contained":t}},304:function(e,t){},313:function(e,t,n){"use strict";n.d(t,"b",(function(){return l})),n.d(t,"a",(function(){return i}));var c=n(27),a=n(25),o=n(6),s=n(3);const r=function(){let e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];const{paymentMethodsInitialized:t,expressPaymentMethodsInitialized:n,availablePaymentMethods:r,availableExpressPaymentMethods:l}=Object(o.useSelect)(e=>{const t=e(s.PAYMENT_STORE_KEY);return{paymentMethodsInitialized:t.paymentMethodsInitialized(),expressPaymentMethodsInitialized:t.expressPaymentMethodsInitialized(),availableExpressPaymentMethods:t.getAvailableExpressPaymentMethods(),availablePaymentMethods:t.getAvailablePaymentMethods()}}),i=Object.values(r).map(e=>{let{name:t}=e;return t}),u=Object.values(l).map(e=>{let{name:t}=e;return t}),d=Object(a.getPaymentMethods)(),m=Object(a.getExpressPaymentMethods)(),b=Object.keys(d).reduce((e,t)=>(i.includes(t)&&(e[t]=d[t]),e),{}),p=Object.keys(m).reduce((e,t)=>(u.includes(t)&&(e[t]=m[t]),e),{}),v=Object(c.a)(b),y=Object(c.a)(p);return{paymentMethods:e?y:v,isInitialized:e?n:t}},l=()=>r(!1),i=()=>r(!0)},326:function(e,t,n){"use strict";n.d(t,"a",(function(){return p}));var c=n(5),a=n.n(c),o=function(){return(o=Object.assign||function(e){for(var t,n=1,c=arguments.length;n<c;n++)for(var a in t=arguments[n])Object.prototype.hasOwnProperty.call(t,a)&&(e[a]=t[a]);return e}).apply(this,arguments)};function s(e){return e.toLowerCase()}Object.create,Object.create;var r=[/([a-z0-9])([A-Z])/g,/([A-Z])([A-Z][a-z])/g],l=/[^A-Z0-9]+/gi;function i(e,t,n){return t instanceof RegExp?e.replace(t,n):t.reduce((function(e,t){return e.replace(t,n)}),e)}var u=n(20),d=n(268),m=n(111);function b(e,t){return e&&t?`has-${n=t,void 0===c&&(c={}),function(e,t){return void 0===t&&(t={}),function(e,t){void 0===t&&(t={});for(var n=t.splitRegexp,c=void 0===n?r:n,a=t.stripRegexp,o=void 0===a?l:a,u=t.transform,d=void 0===u?s:u,m=t.delimiter,b=void 0===m?" ":m,p=i(i(e,c,"$1\0$2"),o,"\0"),v=0,y=p.length;"\0"===p.charAt(v);)v++;for(;"\0"===p.charAt(y-1);)y--;return p.slice(v,y).split("\0").map(d).join(b)}(e,o({delimiter:"."},t))}(n,o({delimiter:"-"},c))}-${e}`:"";var n,c}const p=e=>{const t=Object(u.a)(e)?e:{style:{}},n=Object(m.a)(t.style);return function(e){var t,n,c,o,s,r,l;const{backgroundColor:i,textColor:m,gradient:p,style:v}=e,y=b("background-color",i),f=b("color",m),h=function(e){if(e)return`has-${e}-gradient-background`}(p),g=h||(null==v||null===(t=v.color)||void 0===t?void 0:t.gradient);return{className:a()(f,h,{[y]:!g&&!!y,"has-text-color":m||(null==v||null===(n=v.color)||void 0===n?void 0:n.text),"has-background":i||(null==v||null===(c=v.color)||void 0===c?void 0:c.background)||p||(null==v||null===(o=v.color)||void 0===o?void 0:o.gradient),"has-link-color":Object(u.a)(null==v||null===(s=v.elements)||void 0===s?void 0:s.link)?null==v||null===(r=v.elements)||void 0===r||null===(l=r.link)||void 0===l?void 0:l.color:void 0})||void 0,style:function(){let e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};const t={};return Object(d.getCSSRules)(e,{selector:""}).forEach(e=>{t[e.key]=e.value}),t}({color:(null==v?void 0:v.color)||{}})}}({...t,style:n})}},327:function(e,t,n){"use strict";var c=n(13),a=n.n(c),o=n(0),s=n(5),r=n.n(s);const l=e=>"wc-block-components-payment-method-icon wc-block-components-payment-method-icon--"+e;var i=e=>{let{id:t,src:n=null,alt:c=""}=e;return n?Object(o.createElement)("img",{className:l(t),src:n,alt:c}):null},u=n(55);const d=[{id:"alipay",alt:"Alipay",src:u.m+"payment-methods/alipay.svg"},{id:"amex",alt:"American Express",src:u.m+"payment-methods/amex.svg"},{id:"bancontact",alt:"Bancontact",src:u.m+"payment-methods/bancontact.svg"},{id:"diners",alt:"Diners Club",src:u.m+"payment-methods/diners.svg"},{id:"discover",alt:"Discover",src:u.m+"payment-methods/discover.svg"},{id:"eps",alt:"EPS",src:u.m+"payment-methods/eps.svg"},{id:"giropay",alt:"Giropay",src:u.m+"payment-methods/giropay.svg"},{id:"ideal",alt:"iDeal",src:u.m+"payment-methods/ideal.svg"},{id:"jcb",alt:"JCB",src:u.m+"payment-methods/jcb.svg"},{id:"laser",alt:"Laser",src:u.m+"payment-methods/laser.svg"},{id:"maestro",alt:"Maestro",src:u.m+"payment-methods/maestro.svg"},{id:"mastercard",alt:"Mastercard",src:u.m+"payment-methods/mastercard.svg"},{id:"multibanco",alt:"Multibanco",src:u.m+"payment-methods/multibanco.svg"},{id:"p24",alt:"Przelewy24",src:u.m+"payment-methods/p24.svg"},{id:"sepa",alt:"Sepa",src:u.m+"payment-methods/sepa.svg"},{id:"sofort",alt:"Sofort",src:u.m+"payment-methods/sofort.svg"},{id:"unionpay",alt:"Union Pay",src:u.m+"payment-methods/unionpay.svg"},{id:"visa",alt:"Visa",src:u.m+"payment-methods/visa.svg"},{id:"wechat",alt:"WeChat",src:u.m+"payment-methods/wechat.svg"}];var m=n(26);n(304),t.a=e=>{let{icons:t=[],align:n="center",className:c}=e;const s=(e=>{const t={};return e.forEach(e=>{let n={};"string"==typeof e&&(n={id:e,alt:e,src:null}),"object"==typeof e&&(n={id:e.id||"",alt:e.alt||"",src:e.src||null}),n.id&&Object(m.a)(n.id)&&!t[n.id]&&(t[n.id]=n)}),Object.values(t)})(t);if(0===s.length)return null;const l=r()("wc-block-components-payment-method-icons",{"wc-block-components-payment-method-icons--align-left":"left"===n,"wc-block-components-payment-method-icons--align-right":"right"===n},c);return Object(o.createElement)("div",{className:l},s.map(e=>{const t={...e,...(n=e.id,d.find(e=>e.id===n)||{})};var n;return Object(o.createElement)(i,a()({key:"payment-method-icon-"+e.id},t))}))}},415:function(e,t,n){"use strict";n.r(t);var c=n(0),a=n(55),o=n(273),s=n(5),r=n.n(s),l=n(1);const i=Object(l.__)("View my cart","woocommerce");var u=n(294),d=n(326);t.default=e=>{let{className:t,cartButtonLabel:n,style:s}=e;const l=Object(d.a)({style:s});return a.c?Object(c.createElement)(o.a,{className:r()(t,l.className,"wc-block-mini-cart__footer-cart"),style:{...l.style},href:a.c,variant:Object(u.a)(t,"outlined")},n||i):null}},416:function(e,t,n){"use strict";n.r(t);var c=n(0),a=n(55),o=n(273),s=n(5),r=n.n(s),l=n(1);const i=Object(l.__)("Go to checkout","woocommerce");var u=n(294),d=n(326);t.default=e=>{let{className:t,checkoutButtonLabel:n,style:s}=e;const l=Object(d.a)({style:s});return a.d?Object(c.createElement)(o.a,{className:r()(t,l.className,"wc-block-mini-cart__footer-checkout"),variant:Object(u.a)(t,"contained"),style:{...l.style},href:a.d},n||i):null}},439:function(e,t,n){"use strict";n.d(t,"a",(function(){return c}));const c=e=>Object.values(e).reduce((e,t)=>(null!==t.icons&&(e=e.concat(t.icons)),e),[])},490:function(e,t,n){"use strict";n.r(t);var c=n(0),a=n(1),o=n(11),s=n(41),r=n(313),l=n(42),i=n(327),u=n(439),d=n(2),m=n(118),b=n(5),p=n.n(b),v=n(20),y=n(415),f=n(416);const h=()=>{const{paymentMethods:e}=Object(r.b)();return Object(c.createElement)(i.a,{icons:Object(u.a)(e)})},g=e=>e.some(e=>Array.isArray(e)?g(e):Object(v.a)(e)&&null!==e.key);t.default=e=>{let{children:t,className:n,cartButtonLabel:r,checkoutButtonLabel:i}=e;const{cartTotals:u}=Object(l.a)(),b=Object(d.getSetting)("displayCartPricesIncludingTax",!1)?parseInt(u.total_items,10)+parseInt(u.total_items_tax,10):parseInt(u.total_items,10),v=g(t);return Object(c.createElement)("div",{className:p()(n,"wc-block-mini-cart__footer")},Object(c.createElement)(o.TotalsItem,{className:"wc-block-mini-cart__footer-subtotal",currency:Object(s.getCurrencyFromPriceResponse)(u),label:Object(a.__)("Subtotal","woocommerce"),value:b,description:Object(a.__)("Shipping, taxes, and discounts calculated at checkout.","woocommerce")}),Object(c.createElement)("div",{className:"wc-block-mini-cart__footer-actions"},v?t:Object(c.createElement)(c.Fragment,null,Object(c.createElement)(y.default,{cartButtonLabel:r}),Object(c.createElement)(f.default,{checkoutButtonLabel:i}))),Object(c.createElement)(m.a,null,Object(c.createElement)(h,null)))}}}]);