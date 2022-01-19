import java.time.LocalDate;
import java.time.Month;
import java.util.Date;
import java.util.stream.IntStream;
import java.applet.*;
import java.util.*;
import java.io.*;

public class test1
{

public static void main(String[] args) 

{
        // TODO code application logic here
            int[] values={3,10,6,1,4,8,2,5,9,7};
            System.out.printf("count: %d%n", IntStream.of(values).count());
            System.out.printf("min: %d%n", IntStream.of(values).min().getAsInt());
            System.out.printf("max: %d%n", IntStream.of(values).max().getAsInt());
            System.out.printf("sum: %d%n", IntStream.of(values).sum());
            System.out.printf("average: %.2f%n", IntStream.of(values).average().getAsDouble());
            
            
            
            System.out.print("Original values: ");
            IntStream.of(values).forEach(value -> System.out.printf("%d ",value));
            System.out.println();
            
            
            
            System.out.printf("Even values displayed in sorted order");
            IntStream.of(values).filter(value->value%2==0).sorted().forEach(value->System.out.printf("%d",value));
            
            System.out.printf("sum of integers from 1 to 9 :%d%n",IntStream.range(1,10).sum());
            System.out.printf("sum of integers from 1 to 10 :%d%n",IntStream.rangeClosed(1,10).sum());
            Date date = new Date(12, 12, 12);
             System.out.println(date);
             LocalDate ld = LocalDate.of(1931, Month.OCTOBER, 15);
              System.out.println(ld);
              LocalDate ld1 = LocalDate.ofYearDay(2017, 21);
                System.out.println(ld1); 
                LocalDate ld2 = LocalDate.ofYearDay(2017, 90);
                System.out.println(ld2); 
                LocalDate ld3 = LocalDate.ofEpochDay(1); 
                System.out.println(ld3); 
                LocalDate ld4 = LocalDate.ofEpochDay(90);
                System.out.println(ld4);



            

    }
    
}

