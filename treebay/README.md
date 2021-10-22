# Treebay - Laravel Website

Epitech Coding Academy 2021<br>
Authors: Gabriel Dubois & Jun Suzuki

#MVC #Laravel #CRUD

![treebay1](https://user-images.githubusercontent.com/84317349/138425509-c34eb8a2-7e93-4871-b2e6-14433f174e2e.png)
![treebay2](https://user-images.githubusercontent.com/84317349/138425524-ed7ac5e4-9985-4cdc-ade4-293869a8ffe4.png)
![treebay5](https://user-images.githubusercontent.com/84317349/138425552-1e8bb670-631b-4190-aede-134aab4d9e51.png)

### Presentation :

We have implemented a free ads website using Laravel and Tailwind. All pages are responsive from wide screens to smartphones screens.

We have imagined an "ebay of trees", naturally named Treebay. The website offers a wide variety of ads all categorised by wood categories (hardwood, softwood), types of ads (single trees, small bundle, etc) and location. Here's a rough map of our main categories and types : 

          hardwood  -> single tree    -> North
                                      -> East
                                      -> South
                                      -> West     
                                      
                    -> small bundle   -> North
                                      -> East
                                      -> South
                                      -> West   
                                      
                    -> medium bundle  -> North
                                      -> East
                                      -> South
                                      -> West   
                  
          softwood  -> single tree    -> North
                                      -> East
                                      -> South
                                      -> West        
                                      
                    -> small bundle   -> North
                                      -> East
                                      -> South
                                      -> West   
                                      
                    -> medium bundle  -> North
                                      -> East
                                      -> South
                                      -> West   

Those categories are separated, thus permutable as so : 

          single tree    -> North     ->hardwood
                                      ->softwood
                                      
                         -> East      ->hardwood
                                      ->softwood
                                      
                         -> South     ->hardwood
                                      ->softwood
                                      
                         -> West      ->hardwood
                                      ->softwood      

          etc... 

To facilitate navigation for users, we have implemented breadcrumbs (fil d'Ariane) on every post-related pages.

### Please note :

- We voluntarily implemented the ads CRUD within the users ads pages, which seemed more relevant.
- All CRUDS were initially styled using Bootstrap. Therefore some of those pages still use Bootstrap instead of Tailwind. We've paid attention into not using both on the same pages.
- All the images used for testing have been scaled at a maximum width of 500px to optimise loading time. Thus, the images might looked blurred when displayed at full size on individual ad pages.



