<!DOCTYPE html>
<html>
  <head>
    <style>
      body,html{
        background: #000;
        margin: 0;
        height: 100vh;
        font-family: courier;
        color: #0000;
      }
      #c.focus{
        outline: none;
      }
      #c{
        color: #0000;
        width: 100%;
        height: 100%;
        position: absolute;
        background: #000;
        left: 50%;
        display: inline-block;
        color: #000;
        top: 50%;
        border: none;
        transform: translate(-50%, -50%);
      }
    </style>
  </head>
  <body>
    <canvas id=c></canvas>
    <script>
      c=document.querySelector('#c')
      c.width  = 1920
      c.height = 1080
      x=c.getContext('2d')
      S=Math.sin
      C=Math.cos
      Rn=Math.random
      R = function(r,g,b,a) {
        a = a === undefined ? 1 : a;
        return "rgba("+(r|0)+","+(g|0)+","+(b|0)+","+a+")";
      };
      t=go=0
      rsz=window.onresize=()=>{
        setTimeout(()=>{
          if(document.body.clientWidth > document.body.clientHeight*1.77777778){
            c.style.height = '100vh'
            setTimeout(()=>c.style.width = c.clientHeight*1.77777778+'px',0)
          }else{
            c.style.width = '100vw'
            setTimeout(()=>c.style.height = c.clientWidth/1.77777778 + 'px',0)
          }
          c.width=1920
          c.height=c.width/1.777777778
        },0)
      }
      rsz()

      Draw=()=>{
        if(!t){
          window.onload=()=>{
            c.tabIndex=0
            c.focus()
          }
          R=(Rl,Pt,Yw,m)=>{
            M=Math
            A=M.atan2
            H=M.hypot
            X=S(p=A(X,Y)+Rl)*(d=H(X,Y))
            Y=C(p)*d
            X=S(p=A(X,Z)+Yw)*(d=H(X,Z))
            Z=C(p)*d
            Y=S(p=A(Y,Z)+Pt)*(d=H(Y,Z))
            Z=C(p)*d
            if(m){
              X+=oX
              Y+=oY
              Z+=oZ
            }
          }
          sp=2**.5
          for(CB=[],j=6;j--;CB=[...CB,b])for(i=4,b=[];i--;)b=[...b,[(a=[S(p=Math.PI*2/4*i+Math.PI/4)/sp,C(p)/sp,.5])[j%3]*(l=j<3?-1:1),a[(j+1)%3]*l,a[(j+2)%3]*l]]
          Q=()=>[c.width/2+X/Z*900,c.height/2+Y/Z*900]
          Q1=()=>[c.width/4+X/Z*1200,c.height/2+Y/Z*1200]
          Q2=(ox,oy)=>[c.width/2+c.width/4+X/Z*400+ox,c.height/2+Y/Z*400+oy]
          I=(A,B,M,D,E,F,G,H)=>(K=((G-E)*(B-F)-(H-F)*(A-E))/(J=(H-F)*(M-A)-(G-E)*(D-B)))>=0&&K<=1&&(L=((M-A)*(B-F)-(D-B)*(A-E))/J)>=0&&L<=1?[A+K*(M-A),B+K*(D-B)]:0

          stroke=(scol,fcol)=>{
            if(scol){
              x.closePath()
              x.strokeStyle=scol
              x.lineWidth=Math.min(500, 50/Z)
              x.globalAlpha=.5
              x.lineWidth/=4
              x.stroke()
            }
            if(fcol){
              x.fillStyle=fcol
              x.fill()
            }
          }
          
          stroke2=(scol,fcol)=>{
            if(scol){
              x.closePath()
              x.strokeStyle=scol
              x.lineWidth=Math.min(500, 200/Z)
              x.lineWidth/=4
              x.stroke()
            }
            if(fcol){
              x.fillStyle=fcol
              x.fill()
            }
          }

          stroke3=(scol,fcol)=>{
            if(scol){
              x.closePath()
              x.globalAlpha=.2
              x.strokeStyle=scol
              x.lineWidth=Math.min(500, 350/Z)
              x.stroke()
              x.globalAlpha=1
              x.lineWidth/=6
              x.stroke()
            }
            if(fcol){
              x.globalAlpha=.5
              x.fillStyle=fcol
              x.fill()
            }
          }

          keys=Array(256).fill(false)
          c.onkeydown = e => {
            e.preventDefault()
            e.stopPropagation()
            keys[e.keyCode]=true
          }
          c.onkeyup = e => {
            e.preventDefault()
            e.stopPropagation()
            keys[e.keyCode]=false
          }
          
          numPieces=14
          spawnNewPiece=()=>{
            a=[]
            let id
            switch(id=Rn()*numPieces|0){
              case 0:
                a=[
                  [0,-1,0],
                  [0,0,0],
                  [0,1,0],
                  [-1,1,0],
                ]
              break
              case 1:
                a=[
                  [1,-1,0],
                  [0,-1,0],
                  [0,0,0],
                  [-1,0,0],
                ]        
              break
              case 2:
                a=[
                  [-1,0,0],
                  [0,0,0],
                  [1,0,0],
                  [0,-1,0],
                ]
              break
              case 3:
                a=[
                  [-1,-1,0],
                  [-1,0,0],
                  [0,0,0],
                  [0,-1,0],
                ]        
              break
              case 4:
                a=[
                  [-1,-1,0],
                  [0,0,0],
                  [1,0,0],
                  [0,-1,0],
                ]        
              break
              case 5:
                a=[
                  [0,-2,0],
                  [0,-1,0],
                  [0,0,0],
                  [0,1,0],
                ]
              break
              case 6:
                a=[
                  [0,-1,0],
                  [0,0,0],
                  [0,1,0],
                  [1,1,0],
                ]
              break
              case 7:
                a=[
                  [-1,-2,0],
                  [-1,-1,0],
                  [-1,0,0],
                  [0,0,0],
                  [1,0,0],
                  [1,0,1],
                  [-1,-2,1],
                ]
              break
              case 8:
                a=[
                  [-1,-1,0],
                  [-1,0,0],
                  [-1,1,0],
                  [0,1,0],
                  [1,1,0],
                  [1,0,0],
                  [1,-1,0],
                  [0,-1,0],
                ]
              break
              case 9:
                a=[
                  [0,0,0],
                  [1,0,0],
                  [0,-1,0],
                  [-1,0,0],
                  [0,1,0],
                  [0,0,-1],
                  [0,0,1],
                ]
              break
              case 10:
                a=[
                  [-2,-1,0],
                  [-1,-1,0],
                  [0,-1,0],
                  [1,-1,0],
                  [1,0,0],
                  [1,1,0],
                  [1,2,0],
                ]
              break
              case 11:
                a=[
                  [-1,-1,0],
                  [0,-1,0],
                  [0,0,0],
                  [0,1,0],
                  [0,1,-1],
                  [1,1,-1],
                ]
              break
              case 12:
                a=[
                  [-1,-1,0],
                  [0,-1,0],
                  [1,-1,0],
                  [-1,0,0],
                  [0,0,0],
                  [1,0,0],
                  [-1,1,0],
                  [0,1,0],
                  [1,1,0],
                ]
              break
              case 13:
                a=[
                  [-1,-1,0],
                  [0,-1,0],
                  [1,-1,0],
                  [-1,0,0],
                  [1,0,0],
                  [-1,1,0],
                  [0,1,0],
                  [1,1,0],
                  [1,1,-1],
                  [-1,1,-1],
                  [-1,-1,-1],
                  [1,-1,-1],
                ]
              break
            }
            return [a, id]
          }

          print = (caption, X, Y, size, color) => {
            x.font = size + 'px courier'
            caption.split("\n").map((v,i)=>{
              x.fillStyle = color
              let ox=0
              txt=v.split(':').map((q,j)=>{
                if(j)x.fillStyle='#0fc',ox+=(n+2)*size/2
                x.fillText(q, X+ox,Y+i*size)
                n=q.length
              })
            })
          }

          grabNextPiece = () => {
            cprl=cppt=cpyw=0
            if(typeof curPiece !== 'undefined' && curPiece[0][4]<-10){
              init()
              return
            }
            curPiece = nextPiece[0]
            id=nextPiece[1]
            nextPiece = spawnNewPiece()
            curPiece.map(v=>{
              v[3]=0
              v[4]=-14
              v[5]=0
              v[6]=0
              v[7]=0
              v[8]=0
              v[9]=id
              v[10]=v[3]
              v[11]=v[4]
              v[12]=v[5]
            })
          }
          
          highScore = 0
          init = () => {
            box=[]
            curPiece = undefined
            quickdrop = false
            linesCompleted = 0
            interpolationSpeed=99
            dropInterval=1
            landedTimer = -1
            landedInterval=.1
            tgtrl=tgtpt=tgtyw=0
            tgtv=.1
            cprv=Math.PI/2
            moveTimerInterval=.05
            pcturninterval=.2
            dropTimer = pcturnTimer = moveTimer = 0
            cols=Array(numPieces).fill().map((v,i)=>{
              return `hsla(${360/20*i},99%,50%,.1)`
            })
            nextPiece = spawnNewPiece()
            grabNextPiece()
          }
          init()

          tryMove = dir => {
            if(moveTimer>t) return
            good = true
            
            if(Math.abs(tgtyw)>Math.PI/4){
              l = tgtyw > 0
              if(Math.abs(tgtyw)<Math.PI/2+Math.PI/4){
                switch(dir){
                  case 'left': dir = l ? 'backward' : 'forward'
                  break
                  case 'right': dir = !l ? 'backward' : 'forward'
                  break
                  case 'forward': dir = !l ? 'right' : 'left'
                  break
                  case 'backward': dir = l ? 'right' : 'left'
                  break
                }
              }else{
                switch(dir){
                  case 'left': dir = 'right'
                  break
                  case 'right': dir = 'left'
                  break
                  case 'forward': dir = 'backward'
                  break
                  case 'backward': dir = 'forward'
                  break
                }
              }
            }

            switch(dir){
              case 'left':
                curPiece.map(v=>{
                  X=Math.round(v[0]+v[3])
                  Y=Math.round(v[1]+v[4])
                  Z=Math.round(v[2]+v[5])
                  if(X<-4) good=false
                })
                if(good) box.map(v=>{
                   tx=Math.round(v[0])
                   ty=Math.round(v[1])
                   tz=Math.round(v[2])
                   curPiece.map(q=>{
                     X=Math.round(q[0]+q[3])
                     Y=Math.round(q[1]+q[4])
                     Z=Math.round(q[2]+q[5])
                     if(X-1 == tx && Y==ty && Z==tz) good = false
                   })
                })
                if(good){
                  curPiece.map(v=>{
                    v[3]--
                  })
                }
              break
              case 'right':
                curPiece.map(v=>{
                  X=Math.round(v[0]+v[3])
                  Y=Math.round(v[1]+v[4])
                  Z=Math.round(v[2]+v[5])
                  if(X>3) good=false
                })
                if(good) box.map(v=>{
                   tx=Math.round(v[0])
                   ty=Math.round(v[1])
                   tz=Math.round(v[2])
                   curPiece.map(q=>{
                     X=Math.round(q[0]+q[3])
                     Y=Math.round(q[1]+q[4])
                     Z=Math.round(q[2]+q[5])
                     if(X+1 == tx && Y==ty && Z==tz) good = false
                   })
                })
                if(good){
                  curPiece.map(v=>{
                    v[3]++
                  })
                }
              break
              case 'forward':
                curPiece.map(v=>{
                  X=Math.round(v[0]+v[3])
                  Y=Math.round(v[1]+v[4])
                  Z=Math.round(v[2]+v[5])
                  if(Z>3) good=false
                })
                if(good) box.map(v=>{
                   tx=Math.round(v[0])
                   ty=Math.round(v[1])
                   tz=Math.round(v[2])
                   curPiece.map(q=>{
                     X=Math.round(q[0]+q[3])
                     Y=Math.round(q[1]+q[4])
                     Z=Math.round(q[2]+q[5])
                     if(Z+1 == tz && Y==ty && X==tx) good = false
                   })
                })
                if(good){
                  curPiece.map(v=>{
                    v[5]++
                  })
                }
              break
              case 'backward':
                curPiece.map(v=>{
                  X=Math.round(v[0]+v[3])
                  Y=Math.round(v[1]+v[4])
                  Z=Math.round(v[2]+v[5])
                  if(Z<-4) good=false
                })
                if(good) box.map(v=>{
                   tx=Math.round(v[0])
                   ty=Math.round(v[1])
                   tz=Math.round(v[2])
                   curPiece.map(q=>{
                     X=Math.round(q[0]+q[3])
                     Y=Math.round(q[1]+q[4])
                     Z=Math.round(q[2]+q[5])
                     if(Z-1 == tz && Y==ty && X==tx) good = false
                   })
                })
                if(good){
                  curPiece.map(v=>{
                    v[5]--
                  })
                }
              break
            }
            if(good) moveTimer = t+moveTimerInterval
          }


          tryTurn = dir => {

            k16 = keys[16]

            if(pcturnTimer>t) return
            good = true
            testPiece = JSON.parse(JSON.stringify(curPiece))
            switch(dir){
              case 0:
                testPiece.map(v=>{
                  X=v[0]
                  Y=v[1]
                  Z=v[2]
                  if(k16){
                    R(cprv,0,0)
                  } else {
                    R(0,0,-cprv)
                  }
                  X+=v[3]
                  Y+=v[4]
                  Z+=v[5]
                  X=X
                  Y=Y
                  Z=Z
                  if(X<=-5.5 || X>=4.5 || Z<=-5.5 || Z>=4.5) good = false
                  if(good) box.map(q=>{
                    tx=q[0]
                    ty=q[1]
                    tz=q[2]
                    if(tx==X && ty==Y && tz==Z) good = false
                  })
                })
                if(good){
                  if(k16){
                    cprl+=cprv
                  }else{
                    cpyw-=cprv
                  }
                  pcturnTimer=t+pcturninterval
                }
              break
              case 1:
                testPiece.map(v=>{
                  X=v[0]
                  Y=v[1]
                  Z=v[2]
                  R(0,cprv,0)
                  X+=v[3]
                  Y+=v[4]
                  Z+=v[5]
                  X=X
                  Y=Y
                  Z=Z
                  if(X<=-5.5 || X>=4.5 || Z<=-5.5 || Z>=4.5) good = false
                  if(good) box.map(q=>{
                    tx=q[0]
                    ty=q[1]
                    tz=q[2]
                    if(tx==X && ty==Y && tz==Z) good = false
                  })
                })
                if(good){
                  cppt+=cprv
                  pcturnTimer=t+pcturninterval
                }
              break
              case 2:
                testPiece.map(v=>{
                  X=v[0]
                  Y=v[1]
                  Z=v[2]
                  if(k16){
                    R(-cprv,0,0)
                  } else {
                    R(0,0,cprv)
                  }
                  X+=v[3]
                  Y+=v[4]
                  Z+=v[5]
                  X=X
                  Y=Y
                  Z=Z
                  if(X<=-5.5 || X>=4.5 || Z<=-5.5 || Z>=4.5) good = false
                  if(good) box.map(q=>{
                    tx=q[0]
                    ty=q[1]
                    tz=q[2]
                    if(tx==X && ty==Y && tz==Z) good = false
                  })
                })
                if(good){
                  if(k16){
                    cprl-=cprv
                  }else{
                    cpyw+=cprv
                  }
                  pcturnTimer=t+pcturninterval
                }
              break
              case 3:
                testPiece.map(v=>{
                  X=v[0]
                  Y=v[1]
                  Z=v[2]
                  R(0,-cprv,0)
                  X+=v[3]
                  Y+=v[4]
                  Z+=v[5]
                  X=X
                  Y=Y
                  Z=Z
                  if(X<=-5.5 || X>=4.5 || Z<=-5.5 || Z>=4.5) good = false
                  if(good) box.map(q=>{
                    tx=q[0]
                    ty=q[1]
                    tz=q[2]
                    if(tx==X && ty==Y && tz==Z) good = false
                  })
                })
                if(good){
                  cppt-=cprv
                  pcturnTimer=t+pcturninterval
                }
              break
            }
            if(pcturnTimer<t) return true
            return false
          }

          checkRows=()=>{
            for(k=21;k--;) for(j=10;j--;){
              good=true
              for(i=10;i--;){
                if(!(box.filter(v=>Math.abs(v[5]-(i-5))<.1 && Math.abs(v[7]-(j-5))<.1 && Math.abs(v[6]-(k-11))<.1).length)) good=false
              }
              if(good){
                linesCompleted++
                if(linesCompleted>highScore)highScore = linesCompleted
                for(i=10;i--;){
                  box.filter(v=>Math.abs(v[5]-(i-5))<.1 && Math.abs(v[7]-(j-5))<.1 && Math.abs(v[6]-(k-11))<.1).map(q=>q[4] = 1)
                }
              }
              good=true
              for(i=10;i--;){
                if(!(box.filter(v=>Math.abs(v[5]-(j-5))<.1 && Math.abs(v[7]-(i-5))<.1 && Math.abs(v[6]-(k-11))<.1).length)) good=false
              }
              if(good){
                linesCompleted++
                if(linesCompleted>highScore)highScore = linesCompleted
                for(i=10;i--;){
                  box.filter(v=>(v[5]-(j-5))<.1 && Math.abs(v[7]-(i-5))<.1 && Math.abs(v[6]-(k-11))<.1).map(q=>q[4] = 1)
                }
              }
            }
          }

          tryDrop = () => {
            good = true
            curPiece.map((v,i)=>{
              X=Math.round(v[0]+v[3])
              Y=Math.round(v[1]+v[4])
              Z=Math.round(v[2]+v[5])
              if(Y>8) good = false
              if(good) box.map((q,j)=>{
                tx=Math.round(q[0])
                ty=Math.round(q[1])
                tz=Math.round(q[2])
                if(Math.abs(Y+1-ty)<.1 && Math.abs(tx-X)<.1 && Math.abs(tz-Z)<.1) good = false
              })
            })
            if(good){
              curPiece.map(v=>{
                v[4]++
              })
              dropTimer=t+dropInterval
              if(quickdrop) tryDrop()
            }else{
              quickdrop = false
              if(landedTimer == -1){
                landedTimer = t + landedInterval
              } else if(landedTimer < t){
                landedTimer = -1
                curPiece.map(v=>{
                  a=[]
                  a[0]=Math.round(v[0]+v[3])
                  a[1]=Math.round(v[1]+v[4])
                  a[2]=Math.round(v[2]+v[5])
                  a[3]=v[9]
                  a[4]=0
                  a[5]=a[0]
                  a[6]=a[1]
                  a[7]=a[2]
                  box=[...box, a]
                })
                grabNextPiece()
              }
            }
          }
          Rl=Pt=Yw=0

          previewDrop = () => {
            previewPiece = JSON.parse(JSON.stringify(curPiece))
            do{
              good = true
              previewPiece.map((v,i)=>{
                X=Math.round(v[0]+v[3])
                Y=Math.round(v[1]+v[4])
                Z=Math.round(v[2]+v[5])
                if(Y>8) good = false
                if(good) box.map((q,j)=>{
                  tx=Math.round(q[0])
                  ty=Math.round(q[1])
                  tz=Math.round(q[2])
                  if(Y+1 == ty && tx==X && tz==Z) good = false
                })
              })
              if(good){
                previewPiece.map(v=>{
                  v[4]++
                })
              }
            }while(good);
            previewPiece.map((v,i)=>{
              tx=v[0]
              ty=v[1]
              tz=v[2]
              CB.map(q=>{
                x.beginPath()
                q.map(n=>{
                  X=n[0]+tx
                  Y=n[1]+ty
                  Z=n[2]+tz
                  R(v[6],v[7],v[8])
                  X+=v[3]
                  Y+=v[4]
                  Z+=v[5]
                  R(Rl,Pt,Yw,1)
                  if(Z>0) x.lineTo(...Q1())
                })
                stroke('#fff1', '#6662')
              })
              return v
            })
          }
          Rl=Pt=Yw=0
          
          P=[], iPv=.35, iPc=30
          spawnSplosion = (tx,ty,tz) => {
            for(let m=iPc; m--;){
              X=tx
              Y=ty
              Z=tz
              vx=S(p=Math.PI*2*Rn())*S(q=Math.PI*Rn()**.5/2)*(v=iPv*Rn()*(Rn()<.5?-1:1))
              vy=C(q)*v
              vz=C(p)*S(q)*v
              P=[...P, [X,Y,Z,vx,vy,vz,1]]
            }
          }
          
          obliterate = () => {
            box.map((v,i)=>{
              X=v[0]
              Y=v[1]
              Z=v[2]
              if(v[4]){
                spawnSplosion(...v)
                box.map(q=>{
                  X2=q[0]
                  Y2=q[1]
                  Z2=q[2]
                  if(Y2<Y-3){
                    q[1]++
                  }
                })
              }
            })
            box=box.filter(v=>!v[4])
          }
          
          skipnext=false
          checktgtyw = () =>{
            if(Math.abs(tgtyw)>Math.PI/4){
              skipnext=true
              l = tgtyw>0 ? 1 : -1
              s=-.5
              curPiece.map(v=>{
                X = v[0]
                Y = v[1]
                Z = v[2]
                R(0,0,Math.PI/2*l)
                v[0]=X
                v[2]=Z
                X = v[3]-s
                Y = v[4]
                Z = v[5]-s
                R(0,0,Math.PI/2*l)
                v[3]=X+s
                v[5]=Z+s
                X = v[10]-s
                Y = v[11]
                Z = v[12]-s
                R(0,0,Math.PI/2*l)
                v[10]=X+s
                v[12]=Z+s
              })
              box.map(v=>{
                X=v[0]-s
                Y=v[1]
                Z=v[2]-s
                R(0,0,Math.PI/2*l)
                v[0]=X+s
                v[2]=Z+s
                X=v[5]-s
                Y=v[6]
                Z=v[7]-s
                R(0,0,Math.PI/2*l)
                v[5]=X+s
                v[7]=Z+s
              })
              tgtyw-=Math.PI/2*l
            }
          }
          bg = new Image()
          go=false
          bg.onload=()=>{
            go=true
          }
          bg.src='1BXHl8.jpg'
        }
        
        if(go){
          x.globalAlpha=.5
          x.drawImage(bg,0,0,c.width,c.height)
          x.globalAlpha=1
          x.fillStyle='#0008'
          x.fillRect(0,0,c.width,c.height)
          oX=oY=0, oZ=30
          Rl=0
          tgtpt=Math.min(Math.PI/2,Math.max(-Math.PI/2,tgtpt))
          Pt=tgtpt
          
          if(tgtyw>Math.PI)tgtyw-=Math.PI*2
          if(tgtyw<-Math.PI)tgtyw+=Math.PI*2
          
          Yw=tgtyw
          x.lineJoin=x.lineCap='round'

          CB.map(v=>{
            CB.map(q=>{ 
              x.beginPath()
              q.map(n=>{
                X=n[0]*10-.5
                Y=n[1]*20-.5
                Z=n[2]*10-.5
                R(Rl,Pt,Yw,1)
                if(Z>0) x.lineTo(...Q1())
              })
              stroke3('#fff1', '#00fff602')
            })
          })

          P=P.filter(v=>v[6]>0)

          P.map(v=>{
            X=v[0]+=v[3]
            Y=v[1]+=v[4]
            Z=v[2]+=v[5]
            v[6]-=.04
            R(Rl,Pt,Yw,1)
            if(Z>0){
              s=Math.min(500,1400/Z*v[6])
              x.fillStyle='#40f1'
              l=Q1()
              x.fillRect(l[0]-s/2,l[1]-s/2,s,s)
              s/=5
              x.fillStyle='#fff'
              x.fillRect(l[0]-s/2,l[1]-s/2,s,s)
            }
          })

          box.map(v=>{
            tx=v[5]+=(v[0]-v[5])/interpolationSpeed*8
            ty=v[6]+=(v[1]-v[6])/interpolationSpeed*8
            tz=v[7]+=(v[2]-v[7])/interpolationSpeed*8
            if(v[1]<9&&!(box.filter(q=>Math.abs(q[0]-tx)<.1 && Math.abs(q[1]-(v[1]+1))<.1 && Math.abs(q[2]-tz)<.1).length)){
              v[1]++
            }
            CB.map(q=>{
              x.beginPath()
              q.map(n=>{
                X=tx+n[0]
                Y=ty+n[1]
                Z=tz+n[2]
                R(Rl,Pt,Yw,1)
                if(Z>0) x.lineTo(...Q1())
              })
              stroke('#fff6',v[4]?'#fff':cols[v[3]])
            })
          })
          checkRows()

          x.globalAlpha=.85
          X=c.width*.75
          Y=c.height/2
          w=c.width/2
          h=c.height
          x.fillStyle='#266'
          x.fillRect(tx=X-w/2,ty=Y-h/2,w,h)
          x.fillStyle='#102'
          w-=20
          h-=20
          x.fillRect(X-w/2,Y-h/2,w,h)

          tx+=20
          size = 100
          X=250,Y=size+10

          x.globalAlpha=1
          caption = `CUBETRIS`
          print(caption, tx+X, ty+Y-12, size, '#fff')

          size = 60
          X=30,Y+=size+20
          x.fillStyle='#000', x.strokeStyle='#fff5'
          x.globalAlpha=1
          x.fillRect(tx+25,ty+Y+size/2-size*1.5,380,380)
          x.lineWidth = 10
          x.strokeRect(tx+25,ty+Y+size/2-size*1.5,380,380)
          caption=`NEXT PIECE`
          print(caption, tx+X, ty+Y, size, '#fff')

          size = 60
          X=30,Y+=size+350

          ty+=100
          x.fillStyle='#000', x.strokeStyle='#fff5'
          x.globalAlpha=1
          x.fillRect(tx+25,ty+Y+size/2-size*1.5,380,380)
          x.lineWidth = 10
          x.strokeRect(tx+25,ty+Y+size/2-size*1.5,380,380)

        size = 50
          caption=`LINES
COMPLETED`
          print(caption, tx+X, ty+Y, size, '#fff')
          caption=`${linesCompleted}`
          print(caption, tx+X+100, ty+(Y+=120), size*1.5, '#fff')

          caption=`HIGH SCORE`
          print(caption, tx+X, ty+(Y+=100), size, '#fff')
          caption=`${highScore}`
          print(caption, tx+X+100, ty+Y+70, size*1.5, '#fff')
          
          
          x.fillStyle='#000', x.strokeStyle='#fff5'
          x.globalAlpha=1
          tx+=500, ty-=740
          x.fillRect(tx+25,ty+Y+size/2-size*1.5,380,890)
          x.lineWidth = 10
          x.strokeRect(tx+25,ty+Y+size/2-size*1.5,380,890)

          size = 40
    caption=`    CONTROLS

  KEY: ACTION
  `
    print(caption, tx+X, ty+Y, size, '#fff')    
    size = 24
    caption=`
     PIECE MOVEMENT
     LEFT: LEFT
       UP: FORWARD
    RIGHT: RIGHT
     DOWN: BACK
          (toward you)
         
    SPACE: DROP PIECE
    ENTER: INSTANT DROP


  PIECE ROTATION
  CTRL+LFT: YAW LEFT
   CTRL+UP: PITCH FWD
   CTRL+RT: YAW RIGHT
   CTRL+DN: PITCH BACK
   CTRL+SHFT+LEFT
       :ROLL LEFT
   CTRL+SHFT+RIGHT
       :ROLL RIGHT



   CONTAINER
   ALT+RT: ROTATE BOX RT
  ALT+LFT: ROTATE BOX LFT
   ALT+UP: TILT VERT UP
   ALT+DN: TILT VERT DN
`

          print(caption, tx+X, ty+Y, size, '#fff')    
          size = 24
          caption=`
      `
          print(caption, tx+X, ty+Y+90, size, '#fff')    
          
          nextPiece[0].map(v=>{
            tx=v[0]
            ty=v[1]
            tz=v[2]
            CB.map(q=>{
              x.beginPath()
              q.map(n=>{
                X=tx+n[0]
                Y=ty+n[1]
                Z=tz+n[2]
                R(t/2,S(t*(10/3))/1,C(t*10)/4)
                Z+=10
                ox=-255, oy=-190
                if(Z>0) x.lineTo(...Q2(ox,oy))
              })
              stroke2(nextPiece[1]!=-1?'#fff1':'',cols[nextPiece[1]])
            })
          })

          keys.map((v,i)=>{
            if(keys[i]){
              switch(i){
                case 13:
                  quickdrop = true
                break
                case 32:
                  tryDrop()
                break
                case 37:
                  if(keys[18]){
                    tgtyw+=tgtv
                    checktgtyw()
                  } else {
                    if(!keys[17]){
                      tryMove('left')
                    }else{
                      tryTurn(0)
                    }
                  }
                break
                case 38:
                  if(keys[18]){
                    tgtpt+=tgtv
                  } else {
                    if(!keys[17]){
                      tryMove('forward')
                    }else{
                      tryTurn(1)
                    }
                  }
                break
                case 39:
                  if(keys[18]){
                    tgtyw-=tgtv
                    checktgtyw()
                  } else {
                    if(!keys[17]){
                      tryMove('right')
                    }else{
                      tryTurn(2)
                    }
                  }
                break
                case 40:
                  if(keys[18]){
                    tgtpt-=tgtv
                  } else {
                    if(!keys[17]){
                      tryMove('backward')
                    }else{
                      tryTurn(3)
                    }
                  }
                break
              }
            }
          })

          if(dropTimer<t || quickdrop) tryDrop()
         
          pieceTurnSpeed=4, recenter = false
          curPiece = curPiece.map((v,i)=>{
            v[6]+=(a=cprl-v[6])/pieceTurnSpeed
            v[7]+=(b=cppt-v[7])/pieceTurnSpeed
            v[8]+=(e=cpyw-v[8])/pieceTurnSpeed
            if((a||b||e) && Math.abs(a)<.1&&Math.abs(b)<.1&&Math.abs(e)<.1) recenter=true
            tx=v[0]
            ty=v[1]
            tz=v[2]
            CB.map(q=>{
              x.beginPath()
              q.map(n=>{
                X=n[0]+tx
                Y=n[1]+ty
                Z=n[2]+tz
                R(v[6],v[7],v[8])
                X+=v[10]+=(v[3]-v[10])/interpolationSpeed
                Y+=v[11]+=(v[4]-v[11])/interpolationSpeed
                Z+=v[12]+=(v[5]-v[12])/interpolationSpeed
                R(Rl,Pt,Yw,1)
                if(Z>0) x.lineTo(...Q1())
              })
              if(!skipnext) stroke2('#fff1', cols[v[9]])
            })
            return v
          })
          if(recenter){
            v=curPiece.map(q=>{
              X=q[0]
              Y=q[1]
              Z=q[2]
              R(cprl,cppt,cpyw)
              q[0]=X
              q[1]=Y
              q[2]=Z
              q[6]=q[7]=q[8]=0 
              return q
            })
            cprl=cppt=cpyw=0
          }
          skipnext=false
          previewDrop()
          obliterate()
        }
        
        t+=1/60
        requestAnimationFrame(Draw)

      }
      Draw()
    </script>
  </body>
</html>
