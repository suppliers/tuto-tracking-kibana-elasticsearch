function tracker() {
  // Check for anchor
  tags_slug = location.href.split("#");
  if (tags_slug.length > 1) {
    // Make an array in spliting
    tags = tags_slug[1].split('-');
  } else {
    tags = new Array();
  }


  data = {"track":
          {
            "userAgent": navigator.userAgent,
            "platform": navigator.platform,
            "host": location.host,
            "currentPage": location.href,
            "previousPage": location.origin,
            "tags": tags
          }
         };
  return data;
}
console.log(tracker());
