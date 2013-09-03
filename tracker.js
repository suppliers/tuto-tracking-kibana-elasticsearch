function tracker() {
  data = {"track": 
          {
            "userAgent": navigator.userAgent,
            "platform": navigator.platform,
            "host": location.host,
            "currentPage": location.href,
            "previousPage": location.origin,
            "url": location.pathname
          }
         };
  return data;
}
console.log(tracker());
