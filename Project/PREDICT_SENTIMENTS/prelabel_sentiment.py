"""
Prelabel text reviews with a sentiment score and sentiment label based on its score. Score greater than 0 represents
positive text reviews, less than 0 represents negative text reviews, and equal to 0 represents neutral text reviews
using VADER lexicon sentiment intensity analyzer. (dictionary-based prelabelling)

Output file: amazon_mobile_datasets_with_sentiment.csv
"""

# import data
import nltk
nltk.download('vader_lexicon')
import pandas as pd
from time import sleep
from nltk.sentiment.vader import SentimentIntensityAnalyzer

# load dataset
filename = 'PREDICT_SENTIMENTS/results/prepared.csv'
names = ['product.name', 'brand.name', 'review.text', 'review.process', 'review.tokened']
review = pd.read_csv(filename, names=names)

# drop null values
review.dropna(how='any', axis=0, inplace=True)
print(f'\nnull values: {review.isnull().sum().sum()}\n')   # expect: 0

print()


# sentiment label function
# threshold of 0.0, can be experiment further
def label(score):
    threshold = 0.0
    if score > threshold:
        return 'positive'
    elif score < threshold:
        return 'negative'
    else:
        return 'neutral'


# review.process field was preprocess text
# analyzer takes in whole sentence instead of tokenized sentence.
print('VADER lexicon sentiment scoring --- start')
analyzer = SentimentIntensityAnalyzer()
for index, row in review.iterrows():
    scores = analyzer.polarity_scores(str(row['review.process']))
    final = scores['compound']  # aggregate scores
    sentiment = label(final)
    review.at[index, 'score'] = round(final, 3)  # round to 3 decimal places
    review.at[index, 'label'] = sentiment
    print(f'labeling... {index}')
print('VADER lexicon sentiment scoring --- end')

print()

# output to new csv file
print(f'output --- start')
filename = 'PREDICT_SENTIMENTS/results/datasets_with_sentiment.csv'
pd.DataFrame(review).to_csv(filename, index=False, header=None)
sleep(0.5)
print(f'output --- finish')