# Python program to generate WordCloud

# importing all necessary modules
from wordcloud import WordCloud, STOPWORDS
import matplotlib.pyplot as plt
import pandas as pd

# Reads 'Youtube04-Eminem.csv' file
df = pd.read_csv("PREDICT_SENTIMENTS/results/datasets_with_sentiment.csv", encoding="latin-1")

comment_words = ''
stopwords = set(STOPWORDS)

# iterate through the csv file
for val in df.iloc[:, 4]:

    # typecaste each val to string
    val = str(val)

    # split the value
    tokens = val.split()

    # Converts each token into lowercase
    for i in range(len(tokens)):
        tokens[i] = tokens[i].lower()

    comment_words += " ".join(tokens) + " "

wordcloud = WordCloud( background_color='white',
                      stopwords=stopwords,
                      min_font_size=10).generate(comment_words)
#Save image
wordcloud.to_file('PREDICT_SENTIMENTS/results/image.png')
# plot the WordCloud image



