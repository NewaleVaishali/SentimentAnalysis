import csv
import pandas as pd

filename = 'PREDICT_SENTIMENTS/results/datasets_with_sentiment.csv'
lst=[]

with open(filename, encoding='utf-8', errors='ignore') as csvfile:
    datareader = csv.reader(csvfile)
    for row in datareader:
        temp=[]
        temp.append(row[1])
        temp.append(row[6])
        lst.append(temp)

final_lst=[[],[],[],[]]
with open('counts.csv','w',newline='') as f:
    write = csv.writer(f)
    
    for row in lst:
        print('row=',row)

        if(row[0] in final_lst[0]):
            print('already present')
            index = final_lst[0].index(row[0])
            if(row[1]=='positive'):
                final_lst[1][index]=final_lst[1][index]+1

            elif(row[1]=='negative'):
                final_lst[2][index]=final_lst[2][index]+1

            elif(row[1]=='neutral'):
                final_lst[3][index]=final_lst[3][index]+1
        else:
            temp=[]
            temp.append(row[0])
            temp.append(0)
            temp.append(0)
            temp.append(0)
            print('temp=',temp)
            final_lst[0].append(row[0])
            final_lst[1].append(0)
            final_lst[2].append(0)
            final_lst[3].append(0)
            print('final_lst=',final_lst)
            
    print(final_lst)
    list=[]
    count=0
    for t in final_lst[0]:
        temp=[]
        temp.append(final_lst[0][count])
        temp.append(final_lst[1][count])
        temp.append(final_lst[2][count])
        temp.append(final_lst[3][count])
        print('adding',temp)
        list.append(temp)
        write.writerow(temp)
        count=count+1
pd.DataFrame(list).to_csv('PREDICT_SENTIMENTS/results/counts.csv', index=False, header=None)