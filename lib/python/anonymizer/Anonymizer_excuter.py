#!/usr/bin/env python3
from Anonymizer import ItemAnonymizer
import pandas as pd
import random
import string
import sys

# Get the csv file path from the system argument
csv_path = sys.argv[1]

# Make a df and anonymize its data
df        = pd.read_csv(csv_path)
item_anon = ItemAnonymizer(df)
df        = item_anon.anonymize("items")

# Generate a random file name and save it to a csv
random_file_name = ''.join(random.choices(string.ascii_uppercase + string.digits, k=20)) + '.csv'
df.to_csv( random_file_name, index=False)

print(random_file_name)