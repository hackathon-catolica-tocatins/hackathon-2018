import React from 'react';
import {
    StyleSheet,
    Text,
    View,
    Image,
    Dimensions,
    PixelRatio,
    ActivityIndicator,
    TouchableOpacity,
    Platform,
    FlatList,
    Button

} from 'react-native';

import BtnVaiVolta from '../components/BtnVaiVolta'
import Palco from './Palco'
import ImagePicker from 'react-native-image-picker';
import GridView from 'react-native-super-grid';

import Icon from 'react-native-vector-icons/FontAwesome';


export default class Galeria extends React.Component {

    constructor(props) {

        super(props)

        var {payload} = this.props.navigation.state.params

       // console.error(payload)
        this.state = {
            listImages: [],
            avatarSource: null,
            videoSource: null,
            progress: "",
            payload

        };

    }

    static navigationOptions = {
        header: null,
        gesturesEnabled: true
    }


    componentDidMount() {


    }


    selectPhotoTapped() {
        //ImagePicker.openPicker({
        //    width: 300,
        //    height: 400,
        //    cropping: true
        //}).then(image => {
        //    console.log(image);
        //});
        const options = {
            title: 'Registro fotos do acidente',
            takePhotoButtonTitle: 'Tirar foto',
            chooseFromLibraryButtonTitle: 'Escolher da galeria',
            cancelButtonTitle: 'Cancelar',
            quality: 1.0,
            maxWidth: 500,
            maxHeight: 500,
            storageOptions: {
                skipBackup: true
            }
        };

        ImagePicker.showImagePicker(options, (response) => {
            console.log('Response = ', response);

            if (response.didCancel) {
                console.log('User cancelled photo picker');
            }
            else if (response.error) {
                console.log('ImagePicker Error: ', response.error);
            }
            else if (response.customButton) {
                console.log('User tapped custom button: ', response.customButton);
            }
            else {
                //let source = { uri: response.uri };

                // You can also display the image using data:
                /*let source = { uri: 'data:image/jpeg;base64,' + response.data };

                 this.setState({
                 avatarSource: source
                 });*/

                var source

                if (Platform.OS === 'android') {
                    source = {uri: response.uri, isStatic: true};
                } else {
                    source = {uri: response.uri.replace('file://', ''), isStatic: true};
                }

                const item = {
                    uri: source.uri


                }

                this.setState({listImages: [item, ...this.state.listImages]})


            }
        });
    }


    deleteImage(item) {


        var newList = []
        for (let i = 0; i < this.state.listImages.length; i++) {

            if (this.state.listImages[i] != item) {
                newList.push(this.state.listImages[i])
            }

        }

        //console.error(newListImages)

        this.setState({listImages: newList})

    }

    go(){
        var payload = this.state.payload;
        payload.fotos = this.state.listImages
        this.props.navigation.navigate('Finalizacao',{payload})

    }


    render() {

        const myIcon = (<Icon name="trash" size={30} color="#900"/>)

        return (
            <Palco titulo={ 'Fotos (Quantidade: ' + this.state.listImages.length + ')'}  back={() => this.props.navigation.goBack()} go={() => this.go()} >

                <View style={{flex: 1 , flexDirection:'column' }}>
                    <View style={{flex: 7 , flexDirection:'row' }}>


                        {
                            this.state.listImages.length == 0 ?

                                <View style={{ flex: 5, alignItems: 'center', justifyContent:'center' }}>
                                    <Text
                                        style={{fontWeight: '500', fontFamily: "browau", fontSize: 20, textAlign:'center'   }}>Registre imagens do problema encontrado.</Text>

                                </View>

                                :
                                <View style={styles.grid}>


                                        <FlatList
                                                  data={this.state.listImages}
                                                  renderItem={({ item }) => (

                                            <View style={{justifyContent: 'flex-start', alignItems: 'center', padding: 5}}  id="root">
                                                    <Image style={[styles.resizeItem]}
                                                           source={{ uri: item.uri}}
                                                          />
                                                            <TouchableOpacity onPress={()=> this.deleteImage(item)}>
                                                                <Icon name="trash" size={30} color="#2c5871"/>
                                                            </TouchableOpacity>

                                                </View>

                                                )}
                                        />


                                </View>
                     }
                    </View>


                    <View style={styles.container}>

                        <Button onPress={()=> this.selectPhotoTapped()} title="Inserir imagem"/>



                    </View>
                </View>




            </Palco>
        );
    }

}


const styles = StyleSheet.create({

    qtd: {
        fontSize: 20,
        fontWeight: '500',
        marginBottom: 20

    },
    resizeImage: {
        height: undefined,
        width: '100$',
    },
    resizeItem: {
        aspectRatio:1,
        width: '100%',
        borderRadius: 10,
    },
    container: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
        padding: 10,



    },
    grid: {
        flex: 7,
        justifyContent: 'center',
        alignItems: 'center',


    },
    avatarContainer: {
        borderColor: '#9B9B9B',
        borderWidth: 1 / PixelRatio.get(),
        justifyContent: 'center',
        alignItems: 'center'
    },
    avatar: {
        borderRadius: 75,
        width: 150,
        height: 150
    }
});