Class MainWindow
    'ButtonCalcular.Text = "Calcular Volumen"
    Const Pi As Single = 3.141592654
    Dim R, H, V As Single
    Private Sub Button_Click(sender As Object, e As RoutedEventArgs)
        R = Val(TextBox1.Text) / 2
        H = Val(TextBox2.Text)
        V = Pi * (R ^ 2) * H
        LabelResultados.Text = "El volumen del cilindro es de " & V & " metros cúbicos"
    End Sub
End Class
