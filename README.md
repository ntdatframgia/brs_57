# Book review system


**User**
- can register, signin, signout
- can see the list of all books
- can search books by title, category, rating, favorite, etc.
- can rate and write a review for book (also can edit, delete it)
- can comment to a review (also can edit, delete it)
- can mark a book as reading
- can mark a book as read
- can mark a book as his/her favorite book
- can see reading history
- can follow/unfollow other users
- can see other user's favorite book list
- can see the activities on the timeline on home page
- can send admin a request to buy a new book (also can cancel it)
- can see the list of the requests he/she sent
- can like/unlike to an activity

**Admin**
- cannot register on browser
- can signin, signout
- can manage (CRUD) books
- can manage users
- can manage the requests to buy a new book sent from users

**Book**
- must belong to a category
- must have informations at least: title, publish date, author, the number of pages, category

**Activities**
* follow/followed
* mark as read
* mark as favorite
* write review
* write comment



----------

# Step by step

1. Design database
2. Add task on redmine + estimate time
3. Static page
4. Init model + relationship
5. Login logout
6. Other pulls

> Notice: Trừ pull về init model, còn lại các pull khác không nhiều hơn 15 files


----------


# Step to update task on redmine

1. Change Status to "In Progress", "Due date"
2. Update  "Spent time", "% Done (100)",  before send pull request to trainer 
3. if trainer COMMENT, change "% Done (80)", after that continue to fix comment else move to step 4
4. after MERGED, update task infomation "spent time", "% Done (100)", Status to "Resolved"
