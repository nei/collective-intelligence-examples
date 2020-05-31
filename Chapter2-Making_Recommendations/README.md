### Finding Similar Users

After collecting data about the things people like, you need a way to determine how similar people are in their tastes. You do this by comparing each person with every other person and calculating a similarity score. There are a few ways to do this, and in this section I’ll show you two systems for calculating similarity scores: Euclidean distance and Pearson correlation.

#### Euclidean Distance Score

One very simple way to calculate a similarity score is to use a Euclidean distance score, which takes the items that people have ranked in common and uses them as axes for a chart. You can then plot the people on the chart and see how close together they are.


#### Pearson Correlation Score

A slightly more sophisticated way to determine the similarity between people’s inter- ests is to use a Pearson correlation coefficient. The correlation coefficient is a mea- sure of how well two sets of data fit on a straight line. The formula for this is more complicated than the Euclidean distance score, but it tends to give better results in situations where the data isn’t well normalized—for example, if critics’ movie rank- ings are routinely more harsh than average.


### Results
```
| Euclidean       	                  	| Score    	|| Pearson method                          	| Score    	    |
|------------------	|------------------	|----------	||---------------------	|------------------	|--------------	|
| Gene Seymour     	| Jack Matthews    	| 0.666667 	|| Michael Phillips 	| Claudia Puig     	| 1.000000  	|
| Michael Phillips 	| Claudia Puig     	| 0.535898 	|| Lisa Rose        	| Toby             	| 0.991241  	|
| Lisa Rose        	| Michael Phillips 	| 0.472136 	|| Gene Seymour     	| Jack Matthews    	| 0.963796  	|
| Lisa Rose        	| Mick LaSalle     	| 0.414214 	|| Mick LaSalle     	| Toby             	| 0.924473  	|
| Mick LaSalle     	| Toby             	| 0.400000 	|| Claudia Puig     	| Toby             	| 0.893405  	|
| Lisa Rose        	| Claudia Puig     	| 0.387426 	|| Lisa Rose        	| Jack Matthews    	| 0.747018  	|
| Michael Phillips 	| Mick LaSalle     	| 0.387426 	|| Jack Matthews    	| Toby             	| 0.662849  	|
| Michael Phillips 	| Toby             	| 0.387426 	|| Lisa Rose        	| Mick LaSalle     	| 0.594089  	|
| Claudia Puig     	| Toby             	| 0.356789 	|| Claudia Puig     	| Mick LaSalle     	| 0.566947  	|
| Lisa Rose        	| Toby             	| 0.348331 	|| Lisa Rose        	| Claudia Puig     	| 0.566947  	|
| Lisa Rose        	| Jack Matthews    	| 0.340542 	|| Gene Seymour     	| Mick LaSalle     	| 0.411765  	|
| Gene Seymour     	| Michael Phillips 	| 0.340542 	|| Lisa Rose        	| Michael Phillips 	| 0.404520  	|
| Claudia Puig     	| Jack Matthews    	| 0.320377 	|| Lisa Rose        	| Gene Seymour     	| 0.396059  	|
| Michael Phillips 	| Jack Matthews    	| 0.320377 	|| Gene Seymour     	| Toby             	| 0.381246  	|
| Claudia Puig     	| Mick LaSalle     	| 0.314520 	|| Gene Seymour     	| Claudia Puig     	| 0.314970  	|
| Lisa Rose        	| Gene Seymour     	| 0.294298 	|| Mick LaSalle     	| Jack Matthews    	| 0.211289  	|
| Mick LaSalle     	| Jack Matthews    	| 0.285714 	|| Gene Seymour     	| Michael Phillips 	| 0.204598  	|
| Gene Seymour     	| Claudia Puig     	| 0.281729 	|| Michael Phillips 	| Jack Matthews    	| 0.134840  	|
| Gene Seymour     	| Mick LaSalle     	| 0.277926 	|| Claudia Puig     	| Jack Matthews    	| 0.028571  	|
| Jack Matthews    	| Toby             	| 0.267479 	|| Michael Phillips 	| Mick LaSalle     	| -0.258199 	|
| Gene Seymour     	| Toby             	| 0.258246 	|| Michael Phillips 	| Toby             	| -1.000000 	|
```
