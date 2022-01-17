import java.lang.Object ;
import javafx.application.Application;
import javafx.scene.Scene;
import javafx.scene.effect.Reflection;
import javafx.scene.layout.StackPane;
import javafx.scene.paint.Color;
import javafx.scene.paint.CycleMethod;
import javafx.scene.paint.LinearGradient;
import javafx.scene.paint.Stop;
import javafx.scene.shape.Rectangle;
import javafx.scene.text.Font;
import javafx.scene.text.Text;
import javafx.stage.Stage;
import javafx.stage.StageStyle;
import javafx.scene.Cursor ;



public class task1 extends Application
{
    
	public void start(Stage primaryStage)
	{
		Text t1=new Text("Hello JavaFX");
        Text t2=new Text("Hello JavaFX");
        Rectangle rectangle = new Rectangle(0, 0, 400, 400);

        StackPane r1 =new StackPane();
        
        

        Scene s1=new Scene(r1,400,400);


        s1.setCursor(Cursor.HAND);
    r1.getChildren().add(rectangle);
    r1.getChildren().add(t1);
    r1.getChildren().add(t2);



        s1.getStylesheets().add(getClass().getResource("Style.css").toString());
        rectangle.getStyleClass().add("background");
        t1.getStyleClass().add("text");
        t2.getStyleClass().add("reflectedText");




       
       

        primaryStage.setScene(s1);
        primaryStage.show();


	}

    public static void main(String[] args) {
        Application.launch();
    }
}