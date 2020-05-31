### Finding Similar Users

After collecting data about the things people like, you need a way to determine how similar people are in their tastes. You do this by comparing each person with every other person and calculating a similarity score. There are a few ways to do this, and in this section I’ll show you two systems for calculating similarity scores: Euclidean distance and Pearson correlation.

#### Euclidean Distance Score

One very simple way to calculate a similarity score is to use a Euclidean distance score, which takes the items that people have ranked in common and uses them as axes for a chart. You can then plot the people on the chart and see how close together they are.