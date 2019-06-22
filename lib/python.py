# !/usr/bin/env python3
import pandas as pd
import sys;
import random
import string
import re
from abc import abstractmethod, ABC
from sklearn.feature_extraction.text import CountVectorizer
class Anonymizer(ABC):
    def __init__(self, df):
        self.df = df

    def anonymize(self, tableName):
        tableHeader = tableName[0]
        self.df = self.renameColumnsHeader(tableHeader)
        return self.df

    def renameColumnsHeader(self, tableHeader):
        char = 'a'
        for column in self.df.columns:
            if not re.search(".*id", str(column), re.IGNORECASE):
                self.replaceColumnsData(column)
                char = chr(ord(char) + 1)
        return self.df

    @abstractmethod
    def replaceColumnsData(self, column_name, tableHeader):
        pass

class ItemAnonymizer(Anonymizer):
    def __init__(self, df):
        super().__init__(df)

    def replaceColumnsData(self, column_name):
        words_anonymization = {}
        vectorizer  = CountVectorizer(token_pattern=r'(?u)\b\w+\b')
        analyze     = vectorizer.build_analyzer()
        cleaned_words = []
        
        for row_index, value in enumerate(self.df[column_name]):
            cleaned_words = analyze(value)
            for wordNum , word in enumerate(cleaned_words):
                if word not in words_anonymization:
                    words_anonymization[word] = column_name[0:2] + str(row_index) + str(wordNum)

                cleaned_words[wordNum] = words_anonymization[word]
            self.df.at[row_index, column_name] = " ".join(str(x) for x in cleaned_words)

        return self.df

# Get the csv file path. from the system argument
csv_path = sys.argv[1]
# Make a df and anonymize its data
df        = pd.read_csv(csv_path)
item_anon = ItemAnonymizer(df)
df        = item_anon.anonymize("items")
# Generate a random file name and save it to a csv
random_file_name = ''.join(random.choices(string.ascii_uppercase + string.digits, k=20)) + '.csv'
df.to_csv( random_file_name, index=False)

print(random_file_name)